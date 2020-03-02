<?php

require_once dirname(dirname(dirname(__FILE__))) . '/mgr/file/getlist.class.php';

class msOrderFileGetListWebProcessor extends msOrderFileGetListProcessor
{
    public $permission = 'msof_file_list';

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
        foreach (
            array(
                'order' => 'order_id',
                'user' => 'createdby',
                'ctx',
                'source',
            ) as $k => $v
        ) {
            $this->setProperty($v, $properties[(is_numeric($k) ? $v : $k)]);
        }

        //
        if (empty($this->modx->user->id)) {
            $this->setProperty('session', session_id());
        }

        //
        if (!$properties['anonym'] && !$this->modx->user->id) {
            return $this->modx->lexicon('msorderfiles_err_lock');
        }

        return $initialize;
    }
}

return 'msOrderFileGetListWebProcessor';