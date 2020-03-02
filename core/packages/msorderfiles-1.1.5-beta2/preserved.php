<?php return array (
  'c600ae49e71f8a6a2c8025e4502f56f2' => 
  array (
    'criteria' => 
    array (
      'name' => 'msorderfiles',
    ),
    'object' => 
    array (
      'name' => 'msorderfiles',
      'path' => '{core_path}components/msorderfiles/',
      'assets_path' => '',
    ),
  ),
  '20e1cd957dc155b25c9a181c81268911' => 
  array (
    'criteria' => 
    array (
      'key' => 'msof_source',
    ),
    'object' => 
    array (
      'key' => 'msof_source',
      'value' => '4',
      'xtype' => 'modx-combo-source',
      'namespace' => 'msorderfiles',
      'area' => 'msof_main',
      'editedon' => '2019-04-18 14:58:07',
    ),
  ),
  'd3866acfb176078f9e7a7e7322e8b301' => 
  array (
    'criteria' => 
    array (
      'key' => 'msof_frontend_css',
    ),
    'object' => 
    array (
      'key' => 'msof_frontend_css',
      'value' => '[[+cssUrl]]web/default.css',
      'xtype' => 'textfield',
      'namespace' => 'msorderfiles',
      'area' => 'msof_frontend',
      'editedon' => NULL,
    ),
  ),
  'df88b6020b2f2a89243c0ed3bc8f1c83' => 
  array (
    'criteria' => 
    array (
      'key' => 'msof_frontend_js',
    ),
    'object' => 
    array (
      'key' => 'msof_frontend_js',
      'value' => '[[+jsUrl]]web/default.js',
      'xtype' => 'textfield',
      'namespace' => 'msorderfiles',
      'area' => 'msof_frontend',
      'editedon' => NULL,
    ),
  ),
  '4f6f179bf371e26bac6cafb50cdc7f3f' => 
  array (
    'criteria' => 
    array (
      'name' => 'msOrderFilesPolicy',
    ),
    'object' => 
    array (
      'id' => 17,
      'name' => 'msOrderFilesPolicy',
      'description' => 'A policy for create / update msOrderFiles.',
      'parent' => 0,
      'template' => 12,
      'class' => '',
      'data' => '{"msof_file_list":true,"msof_file_upload":true,"msof_file_update":true,"msof_file_remove":true}',
      'lexicon' => 'msorderfiles:permissions',
    ),
  ),
  'afb68fb8dc84fb90c0ec6e2a970da3b3' => 
  array (
    'criteria' => 
    array (
      'name' => 'msOrderFilesPolicyTemplate',
    ),
    'object' => 
    array (
      'id' => 12,
      'template_group' => 1,
      'name' => 'msOrderFilesPolicyTemplate',
      'description' => 'A policy for users to create / update msOrderFiles.',
      'lexicon' => 'msorderfiles:permissions',
    ),
  ),
  '8557be1e0c86add241318ecbc723e862' => 
  array (
    'criteria' => 
    array (
      'template' => 12,
      'name' => 'msof_file_list',
    ),
    'object' => 
    array (
      'id' => 249,
      'template' => 12,
      'name' => 'msof_file_list',
      'description' => 'msof_file_list',
      'value' => 1,
    ),
  ),
  'dbb0bb7367ee97332e43b35553c14e1c' => 
  array (
    'criteria' => 
    array (
      'template' => 12,
      'name' => 'msof_file_upload',
    ),
    'object' => 
    array (
      'id' => 250,
      'template' => 12,
      'name' => 'msof_file_upload',
      'description' => 'msof_file_upload',
      'value' => 1,
    ),
  ),
  '92629f143e60f6e22430e87f0ae6c1bd' => 
  array (
    'criteria' => 
    array (
      'template' => 12,
      'name' => 'msof_file_update',
    ),
    'object' => 
    array (
      'id' => 251,
      'template' => 12,
      'name' => 'msof_file_update',
      'description' => 'msof_file_update',
      'value' => 1,
    ),
  ),
  'ab8b029aefd517f7382e1d657b8a2760' => 
  array (
    'criteria' => 
    array (
      'template' => 12,
      'name' => 'msof_file_remove',
    ),
    'object' => 
    array (
      'id' => 252,
      'template' => 12,
      'name' => 'msof_file_remove',
      'description' => 'msof_file_remove',
      'value' => 1,
    ),
  ),
  'b8e94bfbb9c16c9b8ea4d5e87b43f175' => 
  array (
    'criteria' => 
    array (
      'category' => 'msOrderFiles',
    ),
    'object' => 
    array (
      'id' => 50,
      'parent' => 0,
      'category' => 'msOrderFiles',
      'rank' => 0,
    ),
  ),
  'e701bfae57fee4e66235e396510431cd' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.msof.form',
    ),
    'object' => 
    array (
      'id' => 139,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.msof.form',
      'description' => '',
      'editor_type' => 0,
      'category' => 50,
      'cache_type' => 0,
      'snippet' => '<div class="msof-form-wrapper [ js-msof-form-wrapper ]">
    <div class="msof-form [ js-msof-form ]" data-msof-propkey="{$propkey}">
        <div class="dz-message">
            {\'msorderfiles_frontend_message\' | lexicon}
        </div>
    </div>
</div>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msorderfiles/elements/chunks/chunk.form.tpl',
      'content' => '<div class="msof-form-wrapper [ js-msof-form-wrapper ]">
    <div class="msof-form [ js-msof-form ]" data-msof-propkey="{$propkey}">
        <div class="dz-message">
            {\'msorderfiles_frontend_message\' | lexicon}
        </div>
    </div>
</div>',
    ),
  ),
  '47c9be08dba32fe47cbbbf5baf53adf1' => 
  array (
    'criteria' => 
    array (
      'name' => 'msofForm',
    ),
    'object' => 
    array (
      'id' => 102,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'msofForm',
      'description' => '',
      'editor_type' => 0,
      'category' => 50,
      'cache_type' => 0,
      'snippet' => '/** @var modX $modx */
/** @var msOrderFiles $msof */
/** @var array $scriptProperties */

$sp = &$scriptProperties;
$modelPath = MODX_CORE_PATH . \'components/msorderfiles/model/msorderfiles/\';
if (!$msof = $modx->getService(\'msorderfiles\', \'msOrderFiles\', $modelPath)) {
    return \'Could not load msOrderFiles class!\';
}
$msof->initialize($modx->context->key);

// Получаем параметры
$sp[\'ctx\'] = $modx->context->key;
$sp[\'tpl\'] = $modx->getOption(\'tpl\', $sp, \'tpl.msof.form\');
$sp[\'order\'] = (int)$modx->getOption(\'order\', $sp, 0);
$sp[\'user\'] = $modx->getOption(\'user\', $sp, 0);
$sp[\'user\'] = (int)(!empty($sp[\'user\']) ? $sp[\'user\'] : $modx->user->id);
$sp[\'source\'] = $modx->getOption(\'source\', $sp, 0);
$sp[\'source\'] = (int)(!empty($sp[\'source\']) ? $sp[\'source\'] : $msof->config[\'mediaSource\']);
$sp[\'anonym\'] = (bool)$modx->getOption(\'anonym\', $sp, true);
$sp[\'secret\'] = $modx->getOption(\'secret\', $sp, \'qwerty\');
$sp[\'dropzone\'] = $modx->getOption(\'dropzone\', $sp, array());
$sp[\'maxFiles\'] = $modx->getOption(\'maxFiles\', $sp, 2);
$sp[\'maxFilesize\'] = $modx->getOption(\'maxFilesize\', $sp, 2);
$sp[\'timeout\'] = $modx->getOption(\'timeout\', $sp, 90000);
$sp[\'toPlaceholder\'] = $modx->getOption(\'toPlaceholder\', $sp, false);

// Скрываем для анонимов, если надо
if (!$sp[\'anonym\'] && !$modx->user->id) {
    return \'\';
}

// Декодируем JSON массив
foreach (array(\'dropzone\') as $v) {
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
unset($params[\'tpl\']);

// Записываем параметры сниппета в сессию
$params[\'propkey\'] = sha1(serialize($sp));
$msof->saveProperties($params[\'propkey\'], $sp);

//
$msof->loadFrontendScripts(null, array(
    \'propkey\' => $params[\'propkey\'],
    \'ctx\' => $sp[\'ctx\'],
    \'dropzone\' => $sp[\'dropzone\'],
    \'maxFiles\' => $sp[\'maxFiles\'],
    \'maxFilesize\' => $sp[\'maxFilesize\'],
    \'timeout\' => $sp[\'timeout\'],
));

//
$output = $msof->Tools->getChunk($sp[\'tpl\'], $params);
if ($sp[\'toPlaceholder\']) {
    $modx->setPlaceholder($sp[\'toPlaceholder\'], $output);
    $output = \'\';
}

return $output;',
      'locked' => 0,
      'properties' => 'a:11:{s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:21:"msorderfiles_prop_tpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:13:"tpl.msof.form";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:5:"order";a:7:{s:4:"name";s:5:"order";s:4:"desc";s:23:"msorderfiles_prop_order";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:6:"source";a:7:{s:4:"name";s:6:"source";s:4:"desc";s:24:"msorderfiles_prop_source";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:4:"user";a:7:{s:4:"name";s:4:"user";s:4:"desc";s:22:"msorderfiles_prop_user";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:6:"anonym";a:7:{s:4:"name";s:6:"anonym";s:4:"desc";s:24:"msorderfiles_prop_anonym";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:6:"secret";a:7:{s:4:"name";s:6:"secret";s:4:"desc";s:24:"msorderfiles_prop_secret";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:6:"qwerty";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:8:"dropzone";a:7:{s:4:"name";s:8:"dropzone";s:4:"desc";s:26:"msorderfiles_prop_dropzone";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:2:"{}";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:8:"maxFiles";a:7:{s:4:"name";s:8:"maxFiles";s:4:"desc";s:26:"msorderfiles_prop_maxFiles";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";s:1:"2";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:11:"maxFilesize";a:7:{s:4:"name";s:11:"maxFilesize";s:4:"desc";s:29:"msorderfiles_prop_maxFilesize";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";s:1:"2";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:7:"timeout";a:7:{s:4:"name";s:7:"timeout";s:4:"desc";s:25:"msorderfiles_prop_timeout";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";s:5:"90000";s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}s:13:"toPlaceholder";a:7:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:31:"msorderfiles_prop_toPlaceholder";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:23:"msorderfiles:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msorderfiles/elements/snippets/snippet.form.php',
      'content' => '/** @var modX $modx */
/** @var msOrderFiles $msof */
/** @var array $scriptProperties */

$sp = &$scriptProperties;
$modelPath = MODX_CORE_PATH . \'components/msorderfiles/model/msorderfiles/\';
if (!$msof = $modx->getService(\'msorderfiles\', \'msOrderFiles\', $modelPath)) {
    return \'Could not load msOrderFiles class!\';
}
$msof->initialize($modx->context->key);

// Получаем параметры
$sp[\'ctx\'] = $modx->context->key;
$sp[\'tpl\'] = $modx->getOption(\'tpl\', $sp, \'tpl.msof.form\');
$sp[\'order\'] = (int)$modx->getOption(\'order\', $sp, 0);
$sp[\'user\'] = $modx->getOption(\'user\', $sp, 0);
$sp[\'user\'] = (int)(!empty($sp[\'user\']) ? $sp[\'user\'] : $modx->user->id);
$sp[\'source\'] = $modx->getOption(\'source\', $sp, 0);
$sp[\'source\'] = (int)(!empty($sp[\'source\']) ? $sp[\'source\'] : $msof->config[\'mediaSource\']);
$sp[\'anonym\'] = (bool)$modx->getOption(\'anonym\', $sp, true);
$sp[\'secret\'] = $modx->getOption(\'secret\', $sp, \'qwerty\');
$sp[\'dropzone\'] = $modx->getOption(\'dropzone\', $sp, array());
$sp[\'maxFiles\'] = $modx->getOption(\'maxFiles\', $sp, 2);
$sp[\'maxFilesize\'] = $modx->getOption(\'maxFilesize\', $sp, 2);
$sp[\'timeout\'] = $modx->getOption(\'timeout\', $sp, 90000);
$sp[\'toPlaceholder\'] = $modx->getOption(\'toPlaceholder\', $sp, false);

// Скрываем для анонимов, если надо
if (!$sp[\'anonym\'] && !$modx->user->id) {
    return \'\';
}

// Декодируем JSON массив
foreach (array(\'dropzone\') as $v) {
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
unset($params[\'tpl\']);

// Записываем параметры сниппета в сессию
$params[\'propkey\'] = sha1(serialize($sp));
$msof->saveProperties($params[\'propkey\'], $sp);

//
$msof->loadFrontendScripts(null, array(
    \'propkey\' => $params[\'propkey\'],
    \'ctx\' => $sp[\'ctx\'],
    \'dropzone\' => $sp[\'dropzone\'],
    \'maxFiles\' => $sp[\'maxFiles\'],
    \'maxFilesize\' => $sp[\'maxFilesize\'],
    \'timeout\' => $sp[\'timeout\'],
));

//
$output = $msof->Tools->getChunk($sp[\'tpl\'], $params);
if ($sp[\'toPlaceholder\']) {
    $modx->setPlaceholder($sp[\'toPlaceholder\'], $output);
    $output = \'\';
}

return $output;',
    ),
  ),
  '7ed77d693fce02001e457a7a888342c3' => 
  array (
    'criteria' => 
    array (
      'name' => 'msofSystem',
    ),
    'object' => 
    array (
      'id' => 52,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'msofSystem',
      'description' => '',
      'editor_type' => 0,
      'category' => 50,
      'cache_type' => 0,
      'plugincode' => '/** @var modX $modx */
/** @var msOrderFiles $msof */

$path = MODX_CORE_PATH . \'components/msorderfiles/model/msorderfiles/\';
if (!is_object($modx->msorderfiles)) {
    $msof = $modx->getService(\'msorderfiles\', \'msOrderFiles\', $path);
} else {
    $msof = $modx->msorderfiles;
}
$className = \'msof\' . $modx->event->name;
$modx->loadClass(\'msofPlugin\', $msof->config[\'pluginsPath\'], true, true);
$modx->loadClass($className, $msof->config[\'pluginsPath\'], true, true);
if (class_exists($className)) {
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
} else {
    // Удаляем событие у плагина, если такого класса не существует
    $event = $modx->getObject(\'modPluginEvent\', array(
        \'pluginid\' => $modx->event->plugin->get(\'id\'),
        \'event\' => $modx->event->name,
    ));
    if ($event instanceof modPluginEvent) {
        $event->remove();
    }
}
return;',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msorderfiles/elements/plugins/plugin.system.php',
      'content' => '/** @var modX $modx */
/** @var msOrderFiles $msof */

$path = MODX_CORE_PATH . \'components/msorderfiles/model/msorderfiles/\';
if (!is_object($modx->msorderfiles)) {
    $msof = $modx->getService(\'msorderfiles\', \'msOrderFiles\', $path);
} else {
    $msof = $modx->msorderfiles;
}
$className = \'msof\' . $modx->event->name;
$modx->loadClass(\'msofPlugin\', $msof->config[\'pluginsPath\'], true, true);
$modx->loadClass($className, $msof->config[\'pluginsPath\'], true, true);
if (class_exists($className)) {
    $handler = new $className($modx, $scriptProperties);
    $handler->run();
} else {
    // Удаляем событие у плагина, если такого класса не существует
    $event = $modx->getObject(\'modPluginEvent\', array(
        \'pluginid\' => $modx->event->plugin->get(\'id\'),
        \'event\' => $modx->event->name,
    ));
    if ($event instanceof modPluginEvent) {
        $event->remove();
    }
}
return;',
    ),
  ),
  '12fd9ae1e4a93eac12bbd23ac26fc69c' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 52,
      'event' => 'OnMODXInit',
    ),
    'object' => 
    array (
      'pluginid' => 52,
      'event' => 'OnMODXInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '0f70ce6472d571273bd9a36cb215601e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 52,
      'event' => 'msOnCreateOrder',
    ),
    'object' => 
    array (
      'pluginid' => 52,
      'event' => 'msOnCreateOrder',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'ac8bbd7cc39c6f888bc6fb7eade0ba3a' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 52,
      'event' => 'msOnManagerCustomCssJs',
    ),
    'object' => 
    array (
      'pluginid' => 52,
      'event' => 'msOnManagerCustomCssJs',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
);