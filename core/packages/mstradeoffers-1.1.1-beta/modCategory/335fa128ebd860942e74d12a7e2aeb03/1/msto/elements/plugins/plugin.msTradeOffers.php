<?php
$msto = $modx->getService('msto', 'msto', $modx->getOption('msto_core_path', null, $modx->getOption('core_path') . 'components/msto/') . 'model/msto/', $scriptProperties);
if (!($msto instanceof msto)) return '';

$eventName = $modx->event->name;
if (method_exists($msto, $eventName) && $msto->active) {
	$msto->$eventName($scriptProperties, $product);
}

switch($modx->event->name){
    case 'msOnAddToCart':
		$tmp = $cart->get();
		$product_id = $tmp[$key]['id'];

		$color = $tmp[$key]['options']['color'];
		if(!$color) return;
		$thumbnail_size = $modx->getOption('ms2_product_thumbnail_size', null, '120x90');

		$offer = $modx->getObject('mstoOffer' ,array(
			'product_id' => $product_id,
			'color' => $color,
			'size' => $tmp[$key]['options']['size'],
		));
		if($offer){
			$tmp[$key]['price'] = $offer->price * $tmp[$key]['count'];
			$tmp[$key]['options']['article'] = $offer->article;
		}

		$q = $modx->prepare("
		    SELECT
		        product_File.url AS original,
		        product_Thumb.url AS thumb
		    FROM {$modx->getTableName('mstoOfferFile')} AS offer_File
		    LEFT JOIN {$modx->getTableName('msProductFile')} AS product_File ON offer_File.image_id = product_File.id
		    LEFT JOIN {$modx->getTableName('msProductFile')} AS product_Thumb ON offer_File.image_id = product_Thumb.parent AND product_Thumb.path = '{$product_id}/{$thumbnail_size}/'
		    WHERE offer_File.product_id = {$product_id} AND offer_File.color = '{$color}'
		    ORDER BY product_File.rank ASC
			LIMIT 1
		");
		if(!$q->execute() || !$image = $q->fetch(PDO::FETCH_ASSOC)) return;
		$tmp[$key]['options']['thumb'] = $image['thumb'];

		$cart->set($tmp);
		break;

	case 'msOnChangeOrderStatus':
		if(!$modx->getOption('msto_show_count', null, false)) return;
		if(empty($status) || $status == 1 || $status == 3) return;
		$products = $order->getMany('Products');
		foreach($products as $product){
			$options = $product->get('options');
			$offer = $modx->getObject('mstoOffer', array(
				'product_id' => $product->id,
				'color' => $options['color'],
				'size' => $options['size'],
			));
			if($offer){
				if($status == 2){
					$offer->set('count', $offer->count - $product->count);
				}else if($status == 4){
					$offer->set('count', $offer->count + $product->count);
				}
				$offer->save();
			}
		}
		break;

    case 'mstoOnCreateOffer':
    case 'mstoOnUpdateOffer':
		// min price from offers, $offer
        $offers = $modx->getIterator('mstoOffer', array('product_id' => $offer->get('product_id')));
		if(!$offers) return;
		foreach($offers as $_offer) $_price[] = $_offer->get('price');
		sort($_price);
		$product = $modx->getObject('msProduct', $offer->get('product_id'));
		$product->set('price', $_price[0]);
		$product->save();
		break;
}