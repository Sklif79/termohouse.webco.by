<?php
/* $msto = $modx->getService('msto', 'msto', $modx->getOption('msto_core_path', null, $modx->getOption('core_path') . 'components/msto/') . 'model/msto/', $scriptProperties);
if (!($msto instanceof msto)) return '';
$modx->lexicon->load('msto:manager');


return;


switch ($modx->event->name) {

	case 'msOnBeforeAddToCart':
		if(empty($count) || $options =='[]') return;
		$id = $product->get('id');
		$_count = $msto->getOfferOption('count', $product->get('id'), $options);
		if($count > $_count){
			$modx->event->output($modx->lexicon('msto_available_count') . $_count . $modx->lexicon('msto_pieces'));
		}
		break;


	case 'msOnBeforeChangeInCart':
		if (empty($count)) return;
		if ($cart_items = $cart->get()) {
			if(!empty($cart_items[$key])) {
				if($cart_items[$key]['options'] =='[]') return;
				$id = $cart_items[$key]['id'];
				$_count = $msto->getOfferOption('count', $id, $cart_items[$key]['options']);
				if($count > $_count){
					$modx->event->output($modx->lexicon('msto_available_count_no'));
				}
			}
		}
		break;

	case 'msOnCreateOrder':
		if(!$products = $msOrder->getMany('Products')) return;
		foreach($products as $product) {
			$product_id = $product->get('product_id');
			$options = $product->get('options');
			$count = $product->get('count');
			if(!$options['color'] || !$options['size']) continue;
			$arr['count'][$product_id][] = array(
				'color' => $options['color'],
				'size' => $options['size'],
				'count' => $count
			);
		}

		$msOrder->set('properties', $modx->toJSON($arr));
		$msOrder->save();
		break;



	case 'msOnChangeOrderStatus':
		if(empty($status) || $status == 1 || $status == 3) return;
		$arr = $order->get('properties');
		if(empty($arr)) return;
		foreach($arr as $a){
			foreach($a as $id => $c){
				foreach($c as $d => $value){
					$offer = $modx->getObject('mstoOffer', array('product_id' => $id, 'color' => $value['color'], 'size' => $value['size']));
					$count = $offer->get('count');

					if($status == 2){
						$offer->set('count', $count - $value['count']);
					}else if($status == 4){
						$offer->set('count', $count + $value['count']);
					}

					$offer->save();
				}
			}
		}
		break;

}
*/