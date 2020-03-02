<?php

abstract class msofPlugin
{
    protected $sp;
    /** @var modX $modx */
    protected $modx;
    /** @var msOrderFiles $msof */
    protected $msof;

    public function __construct(&$modx, &$sp)
    {
        $this->sp = &$sp;
        $this->modx = &$modx;

        $path = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
        $this->msof = $this->modx->getService('msorderfiles', 'msorderfiles', $path);
        $this->msof->initialize($this->modx->context->key);
    }

    abstract public function run();
}
