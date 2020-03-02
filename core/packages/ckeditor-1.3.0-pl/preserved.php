<?php return array (
  'a249b42cbcb2baff68949cecc05996b4' => 
  array (
    'criteria' => 
    array (
      'name' => 'ckeditor',
    ),
    'object' => 
    array (
      'name' => 'ckeditor',
      'path' => '{core_path}components/ckeditor/',
      'assets_path' => '',
    ),
  ),
  'c76eeaa05cf184efcf771305bc5470d8' => 
  array (
    'criteria' => 
    array (
      'name' => 'CKEditor',
    ),
    'object' => 
    array (
      'id' => 28,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'CKEditor',
      'description' => 'CKEditor WYSIWYG editor plugin for MODx Revolution',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'plugincode' => '/**
 * CKEditor WYSIWYG Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnRichTextEditorInit, OnRichTextBrowserInit
 *
 * @var modX $modx
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ckeditor
 */
$enabled = $modx->getOption(\'which_editor\', null, \'CKEditor\') == \'CKEditor\' && $modx->getOption(\'use_editor\', null, true);

switch ($modx->event->name) {
    case \'OnRichTextEditorRegister\':
        $modx->event->output(\'CKEditor\');
        break;
    case \'OnManagerPageBeforeRender\':
        if ($enabled) {
            /** @var CKEditor $ckeditor */
            $ckeditor = $modx->getService(\'ckeditor\', \'CKEditor\', $modx->getOption(\'ckeditor.core_path\', null, $modx->getOption(\'core_path\').\'components/ckeditor/\') . \'model/ckeditor/\');
            $ckeditor->initialize();
        }
        break;
    case \'OnRichTextEditorInit\':
        break;
    case \'OnRichTextBrowserInit\':
        if ($enabled) {
            $funcNum = $_REQUEST[\'CKEditorFuncNum\'];
            $modx->event->output("function(data){
                window.parent.opener.CKEDITOR.tools.callFunction({$funcNum}, data.fullRelativeUrl);
            }");
        }
        break;
}

return;',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 1,
      'static_file' => 'ckeditor/elements/plugins/ckeditor.plugin.php',
      'content' => '/**
 * CKEditor WYSIWYG Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnRichTextEditorInit, OnRichTextBrowserInit
 *
 * @var modX $modx
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ckeditor
 */
$enabled = $modx->getOption(\'which_editor\', null, \'CKEditor\') == \'CKEditor\' && $modx->getOption(\'use_editor\', null, true);

switch ($modx->event->name) {
    case \'OnRichTextEditorRegister\':
        $modx->event->output(\'CKEditor\');
        break;
    case \'OnManagerPageBeforeRender\':
        if ($enabled) {
            /** @var CKEditor $ckeditor */
            $ckeditor = $modx->getService(\'ckeditor\', \'CKEditor\', $modx->getOption(\'ckeditor.core_path\', null, $modx->getOption(\'core_path\').\'components/ckeditor/\') . \'model/ckeditor/\');
            $ckeditor->initialize();
        }
        break;
    case \'OnRichTextEditorInit\':
        break;
    case \'OnRichTextBrowserInit\':
        if ($enabled) {
            $funcNum = $_REQUEST[\'CKEditorFuncNum\'];
            $modx->event->output("function(data){
                window.parent.opener.CKEDITOR.tools.callFunction({$funcNum}, data.fullRelativeUrl);
            }");
        }
        break;
}

return;',
    ),
  ),
  'fefe49ed261a62ab6ab5087139cc5210' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 28,
      'event' => 'OnManagerPageBeforeRender',
    ),
    'object' => 
    array (
      'pluginid' => 28,
      'event' => 'OnManagerPageBeforeRender',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'd3624c6ed3d78cefae41d6b0d844685e' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextEditorRegister',
    ),
    'object' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextEditorRegister',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '02728fff0941d6273fd0f68dceabfed5' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextBrowserInit',
    ),
    'object' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextBrowserInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '6fcc38e091a84ad1f21de4061ef0c614' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextEditorInit',
    ),
    'object' => 
    array (
      'pluginid' => 28,
      'event' => 'OnRichTextEditorInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  '4c6a7c2ad7d9ef1827c1ccaf6927fc3c' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.ui_color',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.ui_color',
      'value' => '#DDDDDD',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '3fca41d828397d290922dd1281e96405' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.toolbar',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.toolbar',
      'value' => '',
      'xtype' => 'textarea',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '4a9df363d7036b3677134cfc42fe3450' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.toolbar_groups',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.toolbar_groups',
      'value' => '[{"name":"document","groups":["mode","document","doctools"]},{"name":"clipboard","groups":["clipboard","undo"]},{"name":"editing","groups":["find","selection","spellchecker"]},{"name":"links"},{"name":"insert"},{"name":"forms"},"/",{"name":"basicstyles","groups":["basicstyles","cleanup"]},{"name":"paragraph","groups":["list","indent","blocks","align","bidi"]},{"name":"styles"},{"name":"colors"},{"name":"tools"},{"name":"others"},{"name":"about"}]',
      'xtype' => 'textarea',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '320987291874e4216c1a5a355c89bf44' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.format_tags',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.format_tags',
      'value' => 'p;h1;h2;h3;h4;h5;h6;pre;address;div',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  'fea50294c03360b2d29760673648719f' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.skin',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.skin',
      'value' => 'moono',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '4b6e43b387e245f9328580a880559a87' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.extra_plugins',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.extra_plugins',
      'value' => '',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '5298f0e97cce8140af8e3f1bebdc799a' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.object_resizing',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.object_resizing',
      'value' => '0',
      'xtype' => 'combo-boolean',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '293c706a1f19468b92ca4767d3e9a2d2' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.autocorrect_dash',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.autocorrect_dash',
      'value' => '—',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '1b140fdec473408bde4fa0d8ffb88667' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.autocorrect_double_quotes',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.autocorrect_double_quotes',
      'value' => '«»',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '6304f547ea0c1445141099ce1aea7a5b' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.autocorrect_single_quotes',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.autocorrect_single_quotes',
      'value' => '„“',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '90fd2ebaaf624ed039ab379fc7b05ea1' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.styles_set',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.styles_set',
      'value' => 'default',
      'xtype' => 'textarea',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '8acb5d92ebedc9f572a8cfdc0a6eb91d' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.remove_plugins',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.remove_plugins',
      'value' => 'forms,smiley,autogrow,liststyle,justify,pagebreak,colorbutton,indentblock,font,newpage,print,save,language,bidi,selectall,preview',
      'xtype' => 'textfield',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
  '7d88b6fd10efa4527bcd1ca2868cb4b0' => 
  array (
    'criteria' => 
    array (
      'key' => 'ckeditor.native_spellchecker',
    ),
    'object' => 
    array (
      'key' => 'ckeditor.native_spellchecker',
      'value' => '1',
      'xtype' => 'combo-boolean',
      'namespace' => 'ckeditor',
      'area' => 'general',
      'editedon' => NULL,
    ),
  ),
);