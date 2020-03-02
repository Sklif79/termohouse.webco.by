<?php

class mstoOfferUpdateProcessor extends modObjectUpdateProcessor {
	public $classKey = 'mstoOffer';
	public $languageTopics = array('msto:default','msto:manager');
	public $permission = 'msproduct_save';

	/** {@inheritDoc} */
	public function beforeSet() {

		// проверка на дубликат
		$options = array(
			'product_id' => $this->getProperty('product_id'),
			'color' => $this->getProperty('color'),
			'id:!=' => $this->getProperty('id'),
		);
		if($this->modx->getOption('msto_show_size', null, true)){
			$options['size'] = $this->getProperty('size');
		}
		if($this->modx->getObject('mstoOffer', $options)){
			$this->modx->error->addField('name', $this->modx->lexicon('msto_err_non_name_unique'));
		}

		if ($price = $this->getProperty('price')) {
			$price = preg_replace(array('/[^0-9%\-,\.]/','/,/'), array('', '.'), $price);
			if (strpos($price, '%') !== false) {
				$price = str_replace('%', '', $price) . '%';
			}
			if (empty($price)) {$price = '0';}
			$this->setProperty('price', $price);
		}

		return parent::beforeSet();
	}

	public function afterSave() {
        $this->modx->invokeEvent('mstoOnUpdateOffer', array(
			'offer' => $this->object,
		));

		if(!$this->getProperty('UpdateFromGrid')){
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

			// если нету фото - создать
			foreach($images as $image_id){
				if(in_array($image_id, $current_images)) continue;
				$img = $this->modx->newObject('mstoOfferFile', array(
					'image_id' => $image_id,
					'product_id' => $this->object->product_id,
					'color' => $this->object->color,
				));
				$img->save();
			}
		}

		return parent::afterSave();
    }


}
return 'mstoOfferUpdateProcessor';