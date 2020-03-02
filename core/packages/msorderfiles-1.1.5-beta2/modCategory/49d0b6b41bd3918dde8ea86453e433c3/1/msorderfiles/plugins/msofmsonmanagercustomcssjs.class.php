<?php

/**
 * Плагин для внедрения новой табы в окно заказа miniShop2.
 */
class msofmsOnManagerCustomCssJs extends msofPlugin
{
    public function run()
    {
        $sp = &$this->sp;
        $msof = &$this->msof;

        if ($sp['page'] == 'orders') {
            $this->modx->controller->addLexiconTopic('msorderfiles:default');
            $this->modx->regClientCSS($msof->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
            $this->modx->regClientCSS($msof->config['cssUrl'] . 'mgr/main.css');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/msorderfiles.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/misc/utils.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/misc/combo.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/misc/default.window.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/misc/default.grid.js');
            $this->modx->regClientStartupScript(preg_replace('/\t{3}/', '', "<script type=\"text/javascript\">
                msOrderFiles.config['connector_url'] = '" . $msof->config['connectorUrl'] . "';
                msOrderFiles.config['media_source'] = " . ((int)$msof->config['mediaSource']) . ";
                msOrderFiles.config['file_extensions'] = " . $this->modx->toJSON($msof->config['fileExtensions']) . ";
            </script>"), true);
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/widgets/files/files.window.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/widgets/files/files.grid.js');
            $this->modx->regClientStartupScript($msof->config['jsUrl'] . 'mgr/inject/order.tab.js');
        }
    }
}