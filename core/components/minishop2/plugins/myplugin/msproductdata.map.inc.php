<?php
return array(
    'fields' => array (
		'currency' => 0,
		'europrice' => 0.0,
		'europrice_old' => 0.0
	  ),
    'fieldMeta' => array (
		'currency' => 
		array (
		  'dbtype' => 'varchar',
		  'precision' => '50',
		  'phptype' => 'integer',
		  'null' => true,
		),
		'europrice' => 
		array (
		  'dbtype' => 'decimal',
		  'precision' => '12,2',
		  'phptype' => 'float',
		  'null' => true,
		  'default' => 0.0,
		),
		'europrice_old' => 
		array (
		  'dbtype' => 'decimal',
		  'precision' => '12,2',
		  'phptype' => 'float',
		  'null' => true,
		  'default' => 0.0,
		),
    )
    ,'indexes' => array(
        'currency' => 
		array (
		  'alias' => 'currency',
		  'primary' => false,
		  'unique' => false,
		  'type' => 'BTREE',
		  'columns' => 
		  array (
			'avaible' => 
			array (
			  'length' => '',
			  'collation' => 'A',
			  'null' => false,
			),
		  ),
		),
		'europrice' => 
		array (
		  'alias' => 'europrice',
		  'primary' => false,
		  'unique' => false,
		  'type' => 'BTREE',
		  'columns' => 
		  array (
			'europrice' => 
			array (
			  'length' => '',
			  'collation' => 'A',
			  'null' => false,
			),
		  ),
		),
		'europrice_old' => 
		array (
		  'alias' => 'europrice',
		  'primary' => false,
		  'unique' => false,
		  'type' => 'BTREE',
		  'columns' => 
		  array (
			'europrice' => 
			array (
			  'length' => '',
			  'collation' => 'A',
			  'null' => false,
			),
		  ),
		),
    )
);