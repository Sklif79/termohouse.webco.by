<?php

/**
 * The home manager controller for msOrderFiles.
 *
 */
class msOrderFilesHomeManagerController extends modExtraManagerController
{
    /** @var msOrderFiles $msOrderFiles */
    public $msOrderFiles;


    /**
     *
     */
    public function initialize()
    {
        $path = $this->modx->getOption('msorderfiles_core_path', null,
                $this->modx->getOption('core_path') . 'components/msorderfiles/') . 'model/msorderfiles/';
        $this->msOrderFiles = $this->modx->getService('msorderfiles', 'msOrderFiles', $path);
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return array('msorderfiles:default');
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('msorderfiles');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->msOrderFiles->config['cssUrl'] . 'mgr/main.css');
        $this->addCss($this->msOrderFiles->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/msorderfiles.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->msOrderFiles->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        msOrderFiles.config = ' . json_encode($this->msOrderFiles->config) . ';
        msOrderFiles.config[\'connector_url\'] = "' . $this->msOrderFiles->config['connectorUrl'] . '";
        Ext.onReady(function() {
            MODx.load({ xtype: "msof-page-home"});
        });
        </script>
        ');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        return $this->msOrderFiles->config['templatesPath'] . 'home.tpl';
    }
}