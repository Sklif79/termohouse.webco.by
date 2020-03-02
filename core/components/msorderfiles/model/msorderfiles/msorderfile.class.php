<?php

class msOrderFile extends xPDOSimpleObject
{
    /** @var modMediaSource $mediaSource */
    public $mediaSource;

    /**
     * @param string $ctx
     *
     * @return bool|modMediaSource|null|object
     */
    public function initializeMediaSource($ctx = '')
    {
        if ($this->mediaSource = $this->xpdo->getObject('sources.modMediaSource', $this->get('source'))) {
            $ctx = $ctx ?: $this->get('context_key');
            $this->mediaSource->set('ctx', $ctx);
            $this->mediaSource->initialize();

            return $this->mediaSource;
        }

        return false;
    }

    /**
     * @param modMediaSource $mediaSource
     *
     * @return bool|string
     */
    public function prepareSource(modMediaSource $mediaSource = null)
    {
        if ($mediaSource) {
            $this->mediaSource = $mediaSource;

            return true;
        } elseif (is_object($this->mediaSource) && $this->mediaSource instanceof modMediaSource) {
            return true;
        } else {
            $this->initializeMediaSource();

            if (!$this->mediaSource || !($this->mediaSource instanceof modMediaSource)) {
                return '[msOrderFiles] Could not initialize media source for order file with id = ' . $this->get('id');
            }

            return true;
        }
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->get('order_id') . '/';
    }

    /**
     * @return bool
     */
    public function isMove()
    {
        return $this->get('path') != $this->getFilePath();
    }

    /**
     * @param array $ancestors
     *
     * @return bool
     */
    public function remove(array $ancestors = array())
    {
        $this->prepareSource();

        if (!$this->mediaSource->removeObject($this->get('path') . $this->get('file'))) {
            $this->xpdo->log(xPDO::LOG_LEVEL_ERROR,
                'Could not remove file at "' . $this->get('path') . $this->get('file') . '": ' . $this->mediaSource->errors['file']);
        }

        return parent::remove($ancestors);
    }

    /**
     * Recursive file rename
     *
     * @param string $new_name
     * @param string $old_name
     *
     * @return bool
     */
    public function rename($new_name, $old_name = '')
    {
        $this->prepareSource();

        if (empty($old_name)) {
            $old_name = $this->get('file');
        }

        $path = $this->get('path');
        $ext = $this->get('ext');
        $name = preg_replace('#\.' . $ext . '$#', '', $new_name);
        $name .= '.' . $ext;

        // Rename
        if ($this->mediaSource->renameObject($path . $old_name, $name)) {
            $this->set('file', $name);
            $this->set('url', $this->mediaSource->getObjectUrl($path . $name));

            return $this->save();
        }

        return false;
    }

    /**
     * @param null $cacheFlag
     *
     * @return bool
     */
    public function save($cacheFlag = null)
    {
        if ($this->isMove() AND ($this->prepareSource() === true)) {
            $this->mediaSource->errors = array();
            $this->set('move', true);
            $old_file = $this->get('path') . $this->get('file');
            $contents = $this->mediaSource->getObjectContents($old_file);

            //
            if (!is_array($contents)) {
                return 'Could not retrieve contents of file ' . $old_file . ' from media source.';
            } elseif ($error = $this->mediaSource->errors['file']) {
                return 'Could not retrieve file ' . $old_file . ' from media source: ' . $error;
            }

            //
            $path = '';
            foreach (explode('/', rtrim($this->getFilePath(), '/')) as $v) {
                $path .= $v . '/';
                $this->mediaSource->createContainer($path, '/');
            }
            $this->mediaSource->createContainer($path, '/');
            if ($this->mediaSource->createObject($path, $this->get('file'), $contents['content'])) {
                $this->mediaSource->removeObject($old_file);
                $this->set('path', $path);
                $this->set('url', $this->mediaSource->getObjectUrl($path . $this->get('file')));
            }
        }

        return parent::save($cacheFlag);
    }
}