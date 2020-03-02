<?php
/** @var modX $modx */
/** @var msOrderFiles $msof */

$path = MODX_CORE_PATH . 'components/msorderfiles/model/msorderfiles/';
if (!is_object($modx->msorderfiles)) {
    $msof = $modx->getService('msorderfiles', 'msOrderFiles', $path);
} else {
    $msof = $modx->msorderfiles;
}
$className = 'msof' . $modx->event->name;
$modx->loadClass('msofPlugin', $msof->config['pluginsPath'], true, true);
$modx->loadClass($className, $msof->config['pluginsPath'], true, true);
if (class_exists($className)) {
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
} else {
    // Удаляем событие у плагина, если такого класса не существует
    $event = $modx->getObject('modPluginEvent', array(
        'pluginid' => $modx->event->plugin->get('id'),
        'event' => $modx->event->name,
    ));
    if ($event instanceof modPluginEvent) {
        $event->remove();
    }
}
return;