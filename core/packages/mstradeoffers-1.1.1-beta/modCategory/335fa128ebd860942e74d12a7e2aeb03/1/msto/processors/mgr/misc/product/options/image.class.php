<?php

class mstoProductGetImageProcessor extends modObjectGetListProcessor {
	public $classKey = 'msProductFile';
	public $defaultSortField = 'product_id';

	public function prepareQueryBeforeCount(xPDOQuery $c)
	{
		$product_id = explode(',', $this->getProperty('product_id'));

		$c->select($this->modx->getSelectColumns('msProductFile', 'msProductFile'));
		$c->select(array('msProductFile.url as value', 'COUNT(msProductFile.product_id) AS total'));
		$c->where(array(
			'parent' => 0,
			'product_id:IN' => $product_id
		));
		$c->groupby('value');



		return $c;
	}

	public function prepareRow(xPDOObject $object)
	{
		$array = $object->toArray();

		return $array;
	}

}

return 'mstoProductGetImageProcessor';