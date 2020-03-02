<?php
class mstoOfferGetProcessor extends modObjectGetProcessor {
	public $classKey = 'mstoOffer';
	public $languageTopics = array('msto:default','msto:manager');

	/** {@inheritDoc} */
	public function cleanup() {
		$array = $this->object->toArray();
		//$array['option_'] = $array['option'];

		return $this->success('', $array);
	}
}
return 'mstoOfferGetProcessor';