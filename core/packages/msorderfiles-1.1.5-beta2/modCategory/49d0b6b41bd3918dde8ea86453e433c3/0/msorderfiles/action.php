<?php

/** @var modX $modx */
/** @var msOrderFiles $msof */

// Подключаем MODX
if (!isset($modx)) {
    define('MODX_API_MODE', true);
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/index.php';
    $modx->getService('error', 'error.modError');
    $modx->getRequest();
    $modx->setLogLevel(modX::LOG_LEVEL_ERROR);
    $modx->setLogTarget('FILE');
    $modx->error->message = null;
    $modx->lexicon->load('default');
}
$ctx = !empty($_REQUEST['ctx']) ? $_REQUEST['ctx'] : $modx->context->key;
if ($ctx != $modx->context->key) {
    $modx->switchContext($ctx);
    $modx->user = null;
    $modx->getUser($ctx);
}

// Подключаем класс msOrderFiles
$modelPath = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
if (!$msof = $modx->getService('msorderfiles', 'msOrderFiles', $modelPath)) {
    exit($modx->toJSON(array('success' => false, 'message' => 'Class msOrderFiles not found')));
}
$msof->initialize($ctx, array('prepareResponse' => true, 'jsonResponse' => true));

//
if (empty($_REQUEST['action']) || empty($_REQUEST['propkey'])) {
    exit($msof->Tools->failure('Access denied'));
} else {
    $propkey = $_REQUEST['propkey'];
}

// Load script properties
$sp = $msof->getProperties($propkey);

// 1) Если нет параметров
// 2) Если не авторизован
if (empty($sp) || !is_array($sp) || (empty($sp['anonym']) && empty($modx->user->id))) {
    exit($msof->Tools->failure('Access denied'));
}

switch ($_REQUEST['action']) {
    case 'getlist':
    case 'upload':
    case 'remove':
        // exit($response = $msof->Tools->failure('Failure', array(
        //     '$_REQUEST' => $_REQUEST,
        //     '$sp' => $sp,
        // )));

        if (!$response = $msof->Tools->runProcessor('web/file/' . $_REQUEST['action'], $_REQUEST)) {
            $response = $modx->toJSON(array(
                'success' => false,
                'code' => 401,
            ));
        }
        break;

    default:
        $response = $msof->Tools->failure('Access denied');
}

@session_write_close();
exit($response);