<?php

/**
 *
 */
class msofOnMODXInit extends msofPlugin
{
    public function run()
    {
        $sp = &$this->sp;
        $modx = &$this->modx;
        $msof = &$this->msof;

        $map = array(
            'msOrder' => array(
                'composites' => array(
                    'Files' => array(
                        'class' => 'msOrderFile',
                        'local' => 'id',
                        'foreign' => 'order_id',
                        'cardinality' => 'many',
                        'owner' => 'local',
                    ),
                ),
            ),
        );

        foreach ($map as $class => $data) {
            $modx->loadClass($class);

            foreach ($data as $tmp => $fields) {
                if ($tmp == 'fields') {
                    foreach ($fields as $field => $value) {
                        foreach (array('fields', 'fieldMeta', 'indexes') as $key) {
                            if (isset($data[$key][$field])) {
                                $modx->map[$class][$key][$field] = $data[$key][$field];
                            }
                        }
                    }
                } elseif ($tmp == 'composites' || $tmp == 'aggregates') {
                    foreach ($fields as $alias => $relation) {
                        if (!isset($modx->map[$class][$tmp][$alias])) {
                            $modx->map[$class][$tmp][$alias] = $relation;
                        }
                    }
                }
            }
        }
    }
}