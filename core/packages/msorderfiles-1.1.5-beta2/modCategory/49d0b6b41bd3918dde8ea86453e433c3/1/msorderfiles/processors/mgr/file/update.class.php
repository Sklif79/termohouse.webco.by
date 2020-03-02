<?php

class msOrderFileUpdateProcessor extends modObjectUpdateProcessor
{
    /** @var msOrderFile $object */
    public $object;
    public $objectType = 'msOrderFile';
    public $classKey = 'msOrderFile';
    public $languageTopics = array('msorderfiles');
    protected $lastName;
    /** @var msOrderFiles $msof */
    protected $msof;

    /**
     * @return bool|null|string
     */
    public function initialize()
    {
        $path = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
        if (!$this->msof = $this->modx->getService('msorderfiles', 'msOrderFiles', $path)) {
            return false;
        }
        $this->msof->initialize($this->modx->context->key);

        return parent::initialize();
    }

    /**
     * @return bool|null|string
     */
    public function beforeSet()
    {
        $id = (int)$this->getProperty('id');
        if (empty($id)) {
            return $this->modx->lexicon('msorderfiles_err_ns');
        }

        $this->lastName = $this->object->get('file');
        if ($newfile = $this->getProperty('newfile', '')) {
            if ($newfile != $this->object->get('url')) {
                $file = $this->msof->Tools->sanitizePath(MODX_BASE_PATH . $this->object->get('url'));
                if (!strstr($newfile, MODX_BASE_PATH)) {
                    $newfile = $this->msof->Tools->sanitizePath(MODX_BASE_PATH . $newfile);
                }
                if (file_exists($newfile)) {
                    if (copy($newfile, $file)) {
                        @unlink($newfile);

                        $this->setProperty('mime', mime_content_type($file));
                        $this->setProperty('size', filesize($file));
                        $this->setProperty('hash', hash_file('sha1', $file));
                    }
                }
            }
        }

        return parent::beforeSet();
    }

    /**
     * @return bool
     */
    public function afterSave()
    {
        $ext = pathinfo($this->lastName, PATHINFO_EXTENSION);
        $file = preg_replace('#\.' . $ext . '$#i', '', $this->object->get('file'));
        $file .= '.' . $ext;
        if ($this->lastName != $file) {
            $this->object->rename($file, $this->lastName);
        }

        return parent::afterSave();
    }
}

return 'msOrderFileUpdateProcessor';