<?php

class mstoProductGetSizeProcessor extends modObjectProcessor {
	public $classKey = 'mstoOffer';


	/** {@inheritDoc} */
	public function process() {
		$query = trim($this->getProperty('query'));
		$limit = trim($this->getProperty('limit', 10));
		$key = $this->getProperty('key');

		$c = $this->modx->newQuery('mstoOffer');
		$c->sortby('size','ASC');
		$c->select('size');
		$c->groupby('size');
		$c->limit($limit);
        if (!empty($query)) {
			$c->where(array('size:LIKE' => "%{$query}%"));
		}
		$found = false;
		if ($c->prepare() && $c->stmt->execute()) {
			$res = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($res as $v) {
				if ($v['size'] == $query) {

					$found = true;
				}
			}
		}
		else {$res = array();}

		if (!$found && !empty($query)) {
			$res = array_merge_recursive(array(array('size' => $query)), $res);
		}


		//$this->modx->log(xPDO::LOG_LEVEL_ERROR, "ORIGINAL = " . print_r($res, true));

		return $this->outputArray($res);





	}

}

return 'mstoProductGetSizeProcessor';