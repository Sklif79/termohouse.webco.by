<?php

class mstoProductGetColorProcessor extends modObjectProcessor {
	public $classKey = 'msProductOption';


	/** {@inheritDoc} */
	public function process() {
		$query = trim($this->getProperty('query'));
		$limit = trim($this->getProperty('limit', 10));
		$key = $this->getProperty('key');

		$c = $this->modx->newQuery('mstoOffer');
		$c->sortby('color','ASC');
		$c->select('color');
		$c->groupby('color');
		$c->limit($limit);
        if (!empty($query)) {
			$c->where(array('color:LIKE' => "%{$query}%"));
		}
		$found = false;
		if ($c->prepare() && $c->stmt->execute()) {
			$res = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($res as $v) {
				if ($v['color'] == $query) {

					$found = true;
				}
			}
		}
		else {$res = array();}

		if (!$found && !empty($query)) {
			$res = array_merge_recursive(array(array('color' => $query)), $res);
		}


		//$this->modx->log(xPDO::LOG_LEVEL_ERROR, "ORIGINAL = " . print_r($res, true));

		return $this->outputArray($res);





	}

}

return 'mstoProductGetColorProcessor';