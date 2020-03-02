<?php

class msOrderFileRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'msOrderFile';
    public $classKey = 'msOrderFile';
    public $languageTopics = array('msorderfiles');
    public $permission = 'msof_file_remove';
    /** @var msOrderFiles $msof */
    protected $msof;

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

        return parent::initialize();
    }

    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        if ($id = (int)$this->getProperty('id')) {
            /** @var msOrderFile $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('msorderfiles_err_nf'));
            }

            $createdby = $object->get('createdby');
            $session = $object->get('session');
            if (!empty($createdby) && $createdby != $this->modx->user->id) {
                return $this->failure($this->modx->lexicon('msorderfiles_err_nf'));
            } elseif (empty($createdby) && $createdby == $this->modx->user->id && $session != session_id()) {
                return $this->failure($this->modx->lexicon('msorderfiles_err_nf'));
            }

            $object->remove();
        } else {
            $ids = $this->modx->fromJSON($this->getProperty('ids'));
            if (empty($ids)) {
                return $this->failure($this->modx->lexicon('msorderfiles_err_ns'));
            } else {
                foreach ($ids as $id) {
                    /** @var msOrderFile $object */
                    if (!$object = $this->modx->getObject($this->classKey, $id)) {
                        return $this->failure($this->modx->lexicon('msorderfiles_err_nf'));
                    }
                    $object->remove();
                }
            }
        }

        return $this->success();
    }
}

return 'msOrderFileRemoveProcessor';