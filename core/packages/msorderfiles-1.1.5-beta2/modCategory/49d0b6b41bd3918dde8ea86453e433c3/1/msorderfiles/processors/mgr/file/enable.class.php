<?php

class msOrderFileEnableProcessor extends modObjectProcessor
{
    public $objectType = 'msOrderFile';
    public $classKey = 'msOrderFile';
    public $languageTopics = array('msorderfiles');
    //public $permission = 'save';

    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('msorderfiles_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var msOrderFile $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('msorderfiles_err_nf'));
            }

            $object->set('active', true);
            $object->save();
        }

        return $this->success();
    }
}

return 'msOrderFileEnableProcessor';
