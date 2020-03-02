<?php

class msOrderFileGetListProcessor extends modObjectGetListProcessor
{
    public $objectType = 'msOrderFile';
    public $classKey = 'msOrderFile';
    public $defaultSortField = 'rank';
    public $defaultSortDirection = 'ASC';
    public $permission = 'msof_file_list';
    /** @var msOrderFiles $msof */
    protected $msof;

    /**
     * @return boolean|string
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
     * @return boolean|string
     */
    public function beforeQuery()
    {
        if (!$this->checkPermissions()) {
            return $this->modx->lexicon('access_denied');
        }

        $this->setProperty('sort', str_replace('_formatted', '', $this->getProperty('sort')));

        return parent::beforeQuery();
    }

    /**
     * @param xPDOQuery $c
     *
     * @return xPDOQuery
     */
    public function prepareQueryBeforeCount(xPDOQuery $c)
    {
        $snippetProperties = array();
        if ($propkey = $this->getProperty('propkey')) {
            $snippetProperties = $this->msof->getProperties($propkey);
        }

        $c->leftJoin('modUserProfile', 'Profile', 'Profile.internalKey = ' . $this->classKey . '.createdby');

        $c->select(array($this->modx->getSelectColumns($this->classKey, $this->classKey)));
        $c->select(array('Profile.fullname as createdby_formatted'));

        //
        foreach (array('order_id', 'createdby') as $v) {
            ${$v} = $this->getProperty($v, false);
            if (is_numeric(${$v})) {
                $c->where(array(
                    $this->classKey . '.' . $v => (int)${$v},
                ));
            }
        }
        if ($session = $this->getProperty('session')) {
            $c->where(array(
                $this->classKey . '.session' => $session,
            ));
        }
        if ($query = trim($this->getProperty('query'))) {
            $c->where(array(
                $this->classKey . '.name:LIKE' => "%{$query}%",
                'OR:' . $this->classKey . '.description:LIKE' => "%{$query}%",
            ));
        }
        
        if (!empty($propkey)) {
            $c->where(array(
                $this->classKey . '.propkey' => $propkey,
            ));
        }

        // $c->prepare();
        // $this->modx->log(1, print_r($c->toSQL(), 1));

        return $c;
    }

    /**
     * @param xPDOObject $obj
     *
     * @return array
     */
    public function prepareRow(xPDOObject $obj)
    {
        $data = $obj->toArray();

        $data['createdby_formatted'] = !empty($data['createdby_formatted']) ? $data['createdby_formatted'] : '(Гость)';

        $data['actions'] = array();
        $data['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-edit',
            'title' => $this->modx->lexicon('msorderfiles_button_update'),
            'action' => 'updateFile',
            'button' => true,
            'menu' => true,
        );
        if (!$data['active']) {
            $data['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-toggle-on action-green',
                'title' => $this->modx->lexicon('msorderfiles_button_enable'),
                'multiple' => $this->modx->lexicon('msorderfiles_button_enable_multiple'),
                'action' => 'enableFile',
                'button' => true,
                'menu' => true,
            );
        } else {
            $data['actions'][] = array(
                'cls' => '',
                'icon' => 'icon icon-toggle-off action-red',
                'title' => $this->modx->lexicon('msorderfiles_button_disable'),
                'multiple' => $this->modx->lexicon('msorderfiles_button_disable_multiple'),
                'action' => 'disableFile',
                'button' => true,
                'menu' => true,
            );
        }
        $data['actions'][] = array(
            'cls' => '',
            'icon' => 'icon icon-trash-o action-red',
            'title' => $this->modx->lexicon('msorderfiles_button_remove'),
            'multiple' => $this->modx->lexicon('msorderfiles_button_remove_multiple'),
            'action' => 'removeFile',
            'button' => true,
            'menu' => true,
        );

        return $data;
    }
}

return 'msOrderFileGetListProcessor';