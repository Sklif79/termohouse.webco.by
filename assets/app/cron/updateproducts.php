<?php
/*скрипт для обновления цен продуктов по крону*/
define('MODX_API_MODE', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');
$modx=new modX();
$modx->initialize('web');	

if(!$docs = $modx->getCollection('modResource', array(
    'class_key' => 'msProduct' 
))){return;}

foreach($docs as $doc){
    $id = $doc->get('id');
		if ($product = $modx->getObject('msProduct', $id)) {
			 	switch ($product->get('currency')) {
				    case 1:
				        $product->set('europrice',$product->get('price') * $modx->getOption('RUB') / 100);
				        $product->set('europrice_old',$product->get('old_price') * $modx->getOption('RUB') / 100);
				        $product->save();
				        break;
				    case 2:
				        $product->set('europrice',$product->get('price') * $modx->getOption('EUR'));
				        $product->set('europrice_old',$product->get('old_price') * $modx->getOption('EUR'));
				        $product->save();
				        break;
				    default:
				    		$product->set('europrice',$product->get('price'));
				        $product->set('europrice_old',$product->get('old_price'));
				        $product->save();
				}
		}
}
