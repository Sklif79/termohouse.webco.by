<?php
class mstoOfferRemoveProcessor extends modObjectRemoveProcessor  {
	public $classKey = 'mstoOffer';
	public $languageTopics = array('msto:default','msto:manager');
	public $permission = 'msproduct_save';
	/** {@inheritDoc} */
	public function initialize() {
		if (!$this->modx->hasPermission($this->permission)) {
			return $this->modx->lexicon('access_denied');
		}
		return parent::initialize();
	}
}
return 'mstoOfferRemoveProcessor';