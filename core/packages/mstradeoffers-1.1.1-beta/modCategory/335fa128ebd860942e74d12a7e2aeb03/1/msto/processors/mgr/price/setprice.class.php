<?php

class mstoOfferActiveProcessor extends modObjectProcessor {
	public $classKey = 'mstoOffer';
	/** {@inheritDoc} */
	public function process() {

		$id = $this->getProperty('id',null);
		if (empty($id)) {
			return $this->success();
		}
		$value = $this->getProperty('value',0);

		if ($price = $this->modx->getObject('mstoOffer',
			array(
				'id' => $id,
			))) {
			$price->set('price', $value);
			$price->save();
		}

		return $this->success();
	}

}
return 'mstoOfferActiveProcessor';