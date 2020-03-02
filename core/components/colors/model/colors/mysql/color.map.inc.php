<?php
$xpdo_meta_map['Color']= array (
  'package' => 'colors',
  'version' => '1.1',
  'table' => 'my_colors',
  'extends' => 'xPDOSimpleObject',
  'tableMeta' => 
  array (
    'engine' => 'MyISAM',
  ),
  'fields' => 
  array (
    'color' => '',
    'image' => '',
  ),
  'fieldMeta' => 
  array (
    'color' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'image' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
  ),
);
