<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
}
else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var msOrderFiles $msOrderFiles */
$msOrderFiles = $modx->getService('msorderfiles', 'msOrderFiles', $modx->getOption('msorderfiles_core_path', null,
        $modx->getOption('core_path') . 'components/msorderfiles/') . 'model/msorderfiles/'
);
$modx->lexicon->load('msorderfiles:default');

// handle request
$corePath = $modx->getOption('msorderfiles_core_path', null, $modx->getOption('core_path') . 'components/msorderfiles/');
$path = $modx->getOption('processorsPath', $msOrderFiles->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));