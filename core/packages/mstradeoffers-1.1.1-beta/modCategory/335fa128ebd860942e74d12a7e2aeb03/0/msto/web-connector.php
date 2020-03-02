<?php
//
if (!empty($_REQUEST['action'])) {
	@session_cache_limiter('nocache');
	define('MODX_REQP', false);
}
// Load MODX config
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
	require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
	require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';
//
if ($modx->user->hasSessionContext($modx->context->get('key'))) {
	$_SERVER['HTTP_MODAUTH'] = $_SESSION["modx." . $modx->context->get('key') . ".user.token"];
} else {
	$_SESSION["modx." . $modx->context->get('key') . ".user.token"] = 0;
	$_SERVER['HTTP_MODAUTH'] = 0;
}
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';
//
$corePath = $modx->getOption('msto_core_path', null, $modx->getOption('core_path') . 'components/msto/');
$msto = $modx->getService('msto', 'msto', $corePath . 'model/msto/');
$modx->lexicon->load('msto:default', 'msto:manager');
// handle request
$path = $modx->getOption('processorsPath', $msto->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path . 'web/',
	'location' => '',
));