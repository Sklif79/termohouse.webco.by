<?php

require_once dirname(dirname(dirname(__FILE__))) . '/mgr/file/remove.class.php';

class msOrderFileRemoveWebProcessor extends msOrderFileRemoveProcessor
{
    public $permission = 'msof_file_remove';

    /**
     * @return bool|null|string
     */
    public function initialize()
    {
        $initialize = parent::initialize();

        //
        if (!$propkey = $this->getProperty('propkey')) {
            return $this->modx->lexicon('msorderfiles_err_propkey_nf');
        }

        //
        $properties = $this->msof->getProperties($propkey);
        if (!is_array($properties)) {
            if ($this->msof->Tools->isJSON($properties)) {
                $properties = $this->modx->fromJSON($properties);
            }
            if (!is_array($properties)) {
                $properties = array();
            }
        }
        if (empty($properties)) {
            return $this->modx->lexicon('msorderfiles_err_properties_nf');
        }

        //
        if ($this->modx->getOption('secret', $properties, 'qwerty') !=
            $this->modx->getOption('msof_secret', null, 'qwerty')
        ) {
            return $this->modx->lexicon('msorderfiles_err_lock');
        }

        //
        if (!$properties['anonym'] && !$this->modx->user->id) {
            return $this->modx->lexicon('msorderfiles_err_lock');
        }

        return $initialize;
    }
}

return 'msOrderFileRemoveWebProcessor';