<?php
/** @var modX $modx */
/** @var msOrderFiles $msof */
/** @var array $scriptProperties */

$sp = &$scriptProperties;
$modelPath = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
if (!$msof = $modx->getService('msorderfiles', 'msOrderFiles', $modelPath)) {
    return 'Could not load msOrderFiles class!';
}
$msof->initialize($modx->context->key);

// Получаем параметры
$sp['ctx'] = $modx->context->key;
$sp['tpl'] = $modx->getOption('tpl', $sp, 'tpl.msof.form');
$sp['order'] = (int)$modx->getOption('order', $sp, 0);
$sp['user'] = $modx->getOption('user', $sp, 0);
$sp['user'] = (int)(!empty($sp['user']) ? $sp['user'] : $modx->user->id);
$sp['source'] = $modx->getOption('source', $sp, 0);
$sp['source'] = (int)(!empty($sp['source']) ? $sp['source'] : $msof->config['mediaSource']);
$sp['anonym'] = (bool)$modx->getOption('anonym', $sp, true);
$sp['secret'] = $modx->getOption('secret', $sp, 'qwerty');
$sp['dropzone'] = $modx->getOption('dropzone', $sp, array());
$sp['maxFiles'] = $modx->getOption('maxFiles', $sp, 2);
$sp['maxFilesize'] = $modx->getOption('maxFilesize', $sp, 2);
$sp['timeout'] = $modx->getOption('timeout', $sp, 90000);
$sp['toPlaceholder'] = $modx->getOption('toPlaceholder', $sp, false);

// Скрываем для анонимов, если надо
if (!$sp['anonym'] && !$modx->user->id) {
    return '';
}

// Декодируем JSON массив
foreach (array('dropzone') as $v) {
    if (isset($sp[$v])) {
        if (!is_array($sp[$v]) && $msof->Tools->isJSON($sp[$v])) {
            $sp[$v] = $modx->fromJSON($sp[$v]);
        }
        if (!is_array($sp[$v])) {
            $sp[$v] = array();
        }
    }
}

// Собираем параметры для вывода
$params = $sp;
unset($params['tpl']);

// Записываем параметры сниппета в сессию
$params['propkey'] = sha1(serialize($sp));
$msof->saveProperties($params['propkey'], $sp);

//
$msof->loadFrontendScripts(null, array(
    'propkey' => $params['propkey'],
    'ctx' => $sp['ctx'],
    'dropzone' => $sp['dropzone'],
    'maxFiles' => $sp['maxFiles'],
    'maxFilesize' => $sp['maxFilesize'],
    'timeout' => $sp['timeout'],
));

//
$output = $msof->Tools->getChunk($sp['tpl'], $params);
if ($sp['toPlaceholder']) {
    $modx->setPlaceholder($sp['toPlaceholder'], $output);
    $output = '';
}

return $output;