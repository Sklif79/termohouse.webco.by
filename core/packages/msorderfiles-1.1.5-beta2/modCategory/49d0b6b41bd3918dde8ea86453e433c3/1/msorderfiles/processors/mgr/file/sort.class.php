<?php

/*
 * From: https://github.com/bezumkin/miniShop2/blob/edb1c8184c37611a5bebb8ce954dd46feb0f51a6/core/components/minishop2/processors/mgr/product/sort.class.php
 */

class msOrderFileSortProcessor extends modObjectProcessor
{
    public $classKey = 'msOrderFile';
    private $_order;

    /**
     * @return array|string
     */
    public function process()
    {
        /** @var msOrderFile $target */
        if (!$target = $this->modx->getObject($this->classKey, $this->getProperty('target'))) {
            return $this->failure();
        }
        $this->_order = $target->get('order_id');

        $sources = json_decode($this->getProperty('sources'), true);
        if (!is_array($sources)) {
            return $this->failure();
        }
        foreach ($sources as $id) {
            /** @var msOrderFile $source */
            $source = $this->modx->getObject($this->classKey, $id);
            if ($source->get('order_id') == $this->_order) {
                $target = $this->modx->getObject($this->classKey, $this->getProperty('target'));
                $this->sort($source, $target);
            } else {
                $this->move($source);
            }
        }
        $this->updateIndex();

        return $this->modx->error->success();
    }

    /**
     * @param msOrderFile $source
     * @param msOrderFile $target
     */
    public function sort(msOrderFile $source, msOrderFile $target)
    {
        $c = $this->modx->newQuery($this->classKey);
        $c->command('UPDATE');
        $c->where(array(
            'order_id' => $this->_order,
        ));
        if ($source->get('rank') < $target->get('rank')) {
            $c->query['set']['rank'] = array(
                'value' => '`rank` - 1',
                'type' => false,
            );
            $c->andCondition(array(
                'rank:<=' => $target->rank,
                'rank:>' => $source->rank,
            ));
            $c->andCondition(array(
                'rank:>' => 0,
            ));
        } else {
            $c->query['set']['rank'] = array(
                'value' => '`rank` + 1',
                'type' => false,
            );
            $c->andCondition(array(
                'rank:>=' => $target->rank,
                'rank:<' => $source->rank,
            ));
        }
        $c->prepare();
        $c->stmt->execute();
        $source->set('rank', $target->get('rank'));
        $source->save();
    }

    /**
     * @param msOrderFile $source
     */
    public function move(msOrderFile $source)
    {
        $source->set('order_id', $this->_order);
        $source->set('rank', $this->modx->getCount($this->classKey, array('order_id' => $this->_order)));
        $source->save();
    }

    /**
     *
     */
    public function updateIndex()
    {
        // Update indexes
        $c = $this->modx->newQuery($this->classKey, array('order_id' => $this->_order));
        $c->select('id');
        $c->sortby('rank ASC, id', 'ASC');
        if ($c->prepare() && $c->stmt->execute()) {
            $table = $this->modx->getTableName($this->classKey);
            $update = $this->modx->prepare("UPDATE {$table} SET rank = ? WHERE id = ?");
            $i = 1;
            while ($id = $c->stmt->fetch(PDO::FETCH_COLUMN)) {
                $update->execute(array($i, $id));
                $i++;
            }
        }
    }
}

return 'msOrderFileSortProcessor';
