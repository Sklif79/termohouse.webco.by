<?php

class mstoWebGetPriceProcessor extends modProcessor {

	public function process() {

		$data = $this->getProperties();
		$output = array();
		$product_id = $data['id'];
		$color =  $data['options']['color'];

		if($data['changed'] == 'options[color]'){
			$q = $this->modx->prepare("SELECT * FROM {$this->modx->getTableName('mstoOffer')}  WHERE product_id = '{$product_id}' AND color = '{$color}' ORDER BY price ASC LIMIT 1");
			if(!$q->execute() || !$offer = $q->fetch(PDO::FETCH_ASSOC)) return;
			$output = $offer;
		}else if($data['changed'] == 'options[size]'){
			$offer = $this->modx->getObject('mstoOffer', array(
				'color' => $color,
				'size' => $data['options']['size'],
				'product_id' => $product_id,
			));
			$output = $offer->toArray();
		}

		$output['success'] = true;
		return $this->modx->toJSON($output);

		/*
		$data = $this->getProperties();
		$data = $data['data'];


		print_r($data); die;

		if (empty($data)) {
			return $this->failure('');
		}
		$msto = $this->modx->msto;
		//
		if (!$id = $data['id']) {
			return $this->failure('');
		}
		if (!$msto->active) {
			return $this->failure('');
		}
		if (!$product = $this->modx->getObject('msProduct', $id)) {
			return $this->failure('');
		}
		//
		$options = array();
		foreach ($data as $k => $v) {
			if (strpos($k, 'options.') === false) {
				continue;
			}
			if (is_array($v)) {
				continue;
			}
			$option = preg_replace(array('/options./'), array(''), $k);
			$options[$option] = $v;
		}


		unset($data);

		$data['article'] = $msto->getOfferOption('article', $id, $options);
		$data['image'] = $msto->getOfferOption('image', $id, $options);
		$data['price'] = $msto->getOfferOption('price', $id, $options);
		$data['count'] = $msto->getOfferOption('count', $id, $options);

		if($options['changed'] == 'color'){
			$data['sizes'] = $msto->getOfferOption('sizes', $id, $options);

			// first size fix
			$options['size'] = $msto->getOfferOption('sizes', $id, $options, true);
			$options['changed'] = 'size';
		}

		$data['price'] = $msto->getOfferOption('price', $id, $options);

		return $msto->success('ОК', $data, array());
		*/

	}

}

return 'mstoWebGetPriceProcessor';