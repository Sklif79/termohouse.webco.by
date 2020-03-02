<?php

class mstoOfferCreateProcessor extends modObjectCreateProcessor {
	public $classKey = 'mstoOffer';
	public $languageTopics = array('msto:default','msto:manager');
	public $permission = 'msproduct_save';

	/** {@inheritDoc} */
	public function beforeSet() {
		$images = $this->getProperty('image_id');
		if(!is_array($images)) $images = (array) $images;
		if(count($images) < 1) return $this->modx->lexicon('Не выбраны фото');

		if ($this->modx->getObject('mstoOffer',array(
			'product_id' => $this->getProperty('product_id'),
			'size' => $this->getProperty('size'),
			'color' => $this->getProperty('color'),
			//'option' => $this->getProperty('option'),
			//'value' => $this->getProperty('value'),
		))) {
			return $this->modx->lexicon('msto_err_non_unique');
		}
		return !$this->hasErrors();
	}
	/** {@inheritDoc} */
	public function beforeSave() {
		$c = $this->modx->newQuery('mstoOffer');
		$c->where(array(
			'product_id' => $this->getProperty('product_id'),
		));

		$this->object->fromArray(array(
			'rank' => $this->modx->getCount('mstoOffer', $c),
			'active' => true
		));

		return parent::beforeSave();
	}


	public function afterSave() {
        $this->modx->invokeEvent('mstoOnCreateOffer', array(
			'offer' => $this->object,
		));

		// новые фото
		$images = $this->getProperty('image_id');
		if(!is_array($images)) $images = (array) $images;

		// текущие фото, удаление
		$current_images = array();
		$c = $this->modx->getIterator('mstoOfferFile', array('product_id' => $this->object->product_id, 'color' => $this->object->color));
		foreach($c as $image_id){
			$current_images[] = $image_id;
			if(!in_array($image_id, $images)){
				$img = $this->modx->getObject('mstoOfferFile', array( 'product_id' => $this->object->product_id, 'color' => $this->object->color, 'image_id' => $image_id ));
				$img->remove();
			}
		}

		// если нету фото - создат
		foreach($images as $image_id){
			if(in_array($image_id, $current_images)) continue;
			$img = $this->modx->newObject('mstoOfferFile', array(
				'image_id' => $image_id,
				'product_id' => $this->object->product_id,
				'color' => $this->object->color,
			));
			$img->save();
		}

		return parent::afterSave();
    }




}
return 'mstoOfferCreateProcessor';