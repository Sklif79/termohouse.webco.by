<?php

class mstoOfferCreateAllProcessor extends modObjectProcessor
{
	public $classKey = 'mstoOffer';

	/** {@inheritDoc} */
	public function process()
	{
		$product_id = $this->getProperty('product_id', 0);
		if (empty($product_id)) {
			return $this->success();
		}
		$price = $this->getProperty('value', 0);
		$option = $this->getProperty('option', 0);
		$operation = $this->getProperty('operation', 1);
		//
		if (!$response = $this->modx->runProcessor('getlist',
			array(
				'limit' => 0,
				'addall' => 0,
				'option' => $option
			),
			array('processors_path' => dirname(dirname(__FILE__)) . '/misc/option/')
		)
		) {
			return $this->success();
		}
		if ($response->isError()) {
			return $this->success();
		}
		$response = $this->modx->fromJSON($response->getResponse());
		if (empty($response['success'])) {
			return $this->success();
		}
		$keys = $response['results'];
		if (empty($keys)) {
			return $this->success();
		}
		//
		foreach ($keys as $v) {
			$option_id = $v['id'];
			if (!$response = $this->modx->runProcessor('getoptions',
				array(
					'option_id' => $option_id,
					'product_id' => $product_id,
				),
				array('processors_path' => dirname(dirname(__FILE__)) . '/misc/product/options/')
			)
			) {
				return $this->success();
			}
			if ($response->isError()) {
				continue;
			}
			$response = $this->modx->fromJSON($response->getResponse());
			if (empty($response['success']) || empty($response['results'])) {
				continue;
			}
			$data[$option_id] = $response['results'];
		}
		if (empty($data)) {
			return $this->success();
		}
		foreach ($data as $option_id => $v) {
			if (!is_array($v)) {
				continue;
			}
			foreach ($v as $z => $o) {
				$this->modx->error->reset();
				if (!$response = $this->modx->runProcessor('create',
					array(
						'product_id' => $product_id,
						'option' => $option_id,
						'value' => $o['value'],
						'price' => $price,
						'operation' => $operation
					),
					array('processors_path' => dirname(__FILE__) . '/')
				)
				) {
					continue;
				}
			}
		}
		return $this->success();
	}
}

return 'mstoOfferCreateAllProcessor';