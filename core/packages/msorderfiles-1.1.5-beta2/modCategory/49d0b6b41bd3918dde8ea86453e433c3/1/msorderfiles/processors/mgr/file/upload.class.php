<?php

class msOrderFileUploadProcessor extends modProcessor
{
    public $classKey = 'msOrderFile';
    public $permission = 'msof_file_upload';
    protected $ctx;
    /** @var modMediaSource $ms */
    protected $ms;
    /** @var msOrderFiles $msof */
    protected $msof;
    /** @var msOrder $order */
    protected $order;

    /**
     * @return bool|null|string
     */
    public function initialize()
    {
        $modelPath = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
        if (!$this->msof = $this->modx->getService('msorderfiles', 'msOrderFiles', $modelPath)) {
            return false;
        }
        $this->msof->initialize($this->modx->context->key);
        $this->getContextKey();

        //
        $order_id = (int)$this->getProperty('order_id', 0);
        if (!empty($order_id) && !$this->modx->getCount('msOrder', $order_id)) {
            return $this->modx->lexicon('msorderfiles_err_order_nf');
        }

        //
        if (!empty($_FILES)) {
            $this->setProperty('files', $_FILES);
        } elseif ($file = $this->getProperty('file', '')) {
            if (!strstr($file, MODX_BASE_PATH)) {
                $file = $this->msof->Tools->sanitizePath(MODX_BASE_PATH . $file);
            }
            if (file_exists($file)) {
                $this->setProperty('files', array(
                    array(
                        'type' => mime_content_type($file),
                        'name' => pathinfo($file, PATHINFO_BASENAME),
                        'tmp_name' => $file,
                        'size' => filesize($file),
                        'error' => '',
                    ),
                ));
            }
        }
        if (!$this->getProperty('files')) {
            return $this->modx->lexicon('msorderfiles_err_upload');
        }

        //
        if (!$this->getProperty('source')) {
            $this->setProperty('source', $this->modx->getOption('msof_source'));
            if (!$this->getProperty('source')) {
                return $this->modx->lexicon('msorderfiles_err_file_source_empty');
            }
        }
        $this->getMediaSource();

        return parent::initialize();
    }

    /**
     * @return array|string
     */
    public function process()
    {
        $msProperties = $this->msof->msProperties;

        //
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('permission_denied'));
        }
        $this->ms->initialize();
        // if (!is_dir($this->ms->getBasePath())) {
        //     return $this->failure($this->modx->lexicon('msorderfiles_err_dir'));
        // }

        // Извлекаем первый файл
        $file = array_shift($this->getProperty('files'));

        // Записываем mime стандарт под правильным ключом
        $file['mime'] = $file['type'];
        unset($file['type']);

        // Разбираем имя и расширение файла
        preg_match('#(.*)\.([a-z0-9]+)$#i', $file['name'], $tmp);
        $file['path'] = $this->getProperty('order_id') . '/'; // путь, относительно базовой директории источника файлов
        $file['file'] = $file['name'];
        $file['name'] = $tmp[1] ?: '';
        $file['ext'] = strtolower($tmp[2] ?: '');
        unset($tmp);

        // Узнаём, можно ли заливать файлы такого типа
        if (!in_array($file['ext'], $this->msof->config['fileExtensions'])) {
            return $this->failure($this->modx->lexicon('upload.notpermitted.extension', array('ext' => $file['ext'])));
        }

        // Переносим файл из tmp директории PHP в корень сайта, вычисляем хеш
        if (!$file = $this->handleFile($file)) {
            @unlink($file['tmp_name']);

            return $this->failure($this->modx->lexicon('msorderfiles_err_upload'));
        }

        // Проверяем по хешу, не загружен ли уже этот файл к данному заказу
        $condition = array(
            'order_id' => (int)$this->getProperty('order_id'),
            'hash' => $file['hash'],
        );
        if (!$condition['createdby'] = (int)$this->getProperty('createdby', $this->modx->user->id)) {
            $condition['session'] = session_id();
            unset($condition['createdby']);
        }
        if ($this->modx->getCount($this->classKey, $condition)) {
            @unlink($file['tmp_name']);

            return $this->failure($this->modx->lexicon('msorderfiles_err_file_order_exist'));
        }
        unset($condition);

        // Приводим имя файла к нужному нам виду
        if (!empty($msProperties['fileNameType']) && $msProperties['fileNameType'] == 'friendly') {
            $tmp = $this->modx->newObject('modResource');
            $file['file'] = $tmp->cleanAlias($file['name']);
            unset($tmp);
        } else {
            $file['file'] = $file['hash'];
        }

        // Исключаем совпадения в именах файлов, при необходимости подставляя цифру в конце имени
        while (true) {
            $i = empty($i) ? 1 : ++$i;
            if ($this->modx->getCount($this->classKey, array(
                'order_id' => (int)$this->getProperty('order_id'),
                'file' => $file['file'] . '.' . $file['ext'],
            ))) {
                $file['file'] = preg_replace('#(-' . ($i - 1) . '|)$#', '-' . $i, $file['file']);
            } else {
                break;
            }
        }
        $file['file'] = $file['file'] . '.' . $file['ext'];

        // Получаем позицию, на которую встанет новый файл
        if (!empty($msProperties['positionNewFiles']) && $msProperties['positionNewFiles'] == 'first') {
            $file['rank'] = 1;
        } else {
            $file['rank'] = $this->modx->getCount($this->classKey, array(
                'order_id' => (int)$this->getProperty('order_id'),
            ));
            ++$file['rank'];
        }

        // Получаем некоторые поля файла, если они переданы
        if ($this->getProperty('name')) {
            $file['name'] = $this->getProperty('name');
        }
        if ($this->getProperty('description')) {
            $file['description'] = $this->getProperty('description');
        }
        if ($properties = $this->getProperty('properties')) {
            if (!is_array($properties)) {
                if ($this->msof->Tools->isJSON($properties)) {
                    $properties = $this->modx->fromJSON($properties);
                }
                if (!is_array($properties)) {
                    $properties = array();
                }
            }
            $file['properties'] = $properties;
        }

        // Создаём запись в базе
        /** @var msOrderFile $uploaded */
        $uploaded = $this->modx->newObject($this->classKey, array_merge(array(
            'order_id' => (int)$this->getProperty('order_id'),
            'source' => (int)$this->ms->get('id'),
            'context_key' => $this->ctx,
            'createdon' => date('Y-m-d H:i:s'),
            'createdby' => (int)$this->getProperty('createdby', $this->modx->user->id),
            'session' => $this->getProperty('session', session_id()),
            'propkey' => $this->getProperty('propkey', ''),
            'active' => true,
            'properties' => array(),
        ), $file));

        //
        $path = '';
        foreach (explode('/', rtrim($uploaded->get('path'), '/')) as $v) {
            $path .= $v . '/';
            $this->ms->createContainer($path, '/');
        }
        $this->ms->createContainer($uploaded->get('path'), '/');
        unset($path);

        $this->ms->errors = array();
        if ($this->ms instanceof modFileMediaSource) {
            $upload = $this->ms->createObject($uploaded->get('path'), $uploaded->get('file'), '');
            if ($upload) {
                copy($file['tmp_name'], urldecode($upload));
            }
        } else {
            $upload = $this->ms->uploadObjectsToContainer($uploaded->get('path'), array(
                array(
                    'name' => $uploaded->get('file'),
                    'tmp_name' => $file['tmp_name'],
                ),
            ));
        }
        @unlink($file['tmp_name']);

        //
        if ($upload) {
            $url = $this->ms->getObjectUrl($uploaded->get('path') . $uploaded->get('file'));
            $uploaded->set('url', $url);
            $uploaded->save();

            // Если в Источнике файлов указано, что новые файлы должны быть первыми
            if (!empty($msProperties['positionNewFiles']) && $msProperties['positionNewFiles'] == 'first') {
                $filesTable = $this->modx->getTableName($this->classKey);
                $sql = join(' ', array(
                    "UPDATE {$filesTable}",
                    "SET rank = rank + 1",
                    "WHERE order_id = '" . ((int)$this->getProperty('order_id')) . "'",
                    "AND id != '" . ((int)$uploaded->get('id')) . "'",
                ));
                $this->modx->exec($sql);
                unset($sql);
            }

            return $this->success('', $uploaded);
        } else {
            $msg = $this->modx->lexicon('msorderfiles_err_file_save') . ': ' . print_r($this->ms->getErrors(), 1);
            $this->modx->log(modX::LOG_LEVEL_ERROR, $msg);

            return $this->failure($msg);
        }
    }

    /**
     * @param $file
     *
     * @return bool
     */
    public function handleFile($file)
    {
        $tf = tempnam(MODX_BASE_PATH, 'msof_');

        if (!empty($file) && !empty($file['tmp_name'])) {
            if (copy($file['tmp_name'], $tf)) {
                if ($this->getProperty('remove_tmp_file', true)) {
                    @unlink($file['tmp_name']);
                }

                $file['tmp_name'] = $tf;
            }
        }
        clearstatcache();

        if (file_exists($file['tmp_name']) && !empty($file['name']) && $file['size'] = filesize($file['tmp_name'])) {
            $file['hash'] = hash_file('sha1', $file['tmp_name']);

            return $file;
        } else {
            @unlink($file['tmp_name']);

            return false;
        }
    }

    /**
     * @return modMediaSource|boolean
     */
    public function getMediaSource()
    {
        $this->modx->loadClass('sources.modMediaSource');
        $this->ms = modMediaSource::getDefaultSource($this->modx, $this->getProperty('source'));

        if (empty($this->ms) || !$this->ms->getWorkingContext()) {
            return false;
        }

        return $this->ms;
    }

    /**
     * @return string
     */
    public function getContextKey()
    {
        if (!$this->getProperty('wctx')) {
            if (!$this->getProperty('ctx')) {
                $this->ctx = $this->modx->context->get('key');
            } else {
                $this->ctx = $this->getProperty('ctx');
            }
        } else {
            $this->ctx = $this->getProperty('wctx');
        }

        return $this->ctx;
    }

    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return $this->modx->hasPermission($this->permission);
    }

    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('msorderfiles:default', 'file', 'core');
    }
}

return 'msOrderFileUploadProcessor';