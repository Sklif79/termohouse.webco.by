<?php
$pdoFetch = $modx->getService('pdoFetch');
$msto = $modx->getService('msto', 'msto', $modx->getOption('msto_core_path', null, $modx->getOption('core_path') . 'components/msto/') . 'model/msto/', $scriptProperties);
$msto->initialize('web');

$thumbnail_size = $modx->getOption('ms2_product_thumbnail_size', null, '120x90');
$product_id = $modx->resource->id;
$article = $_REQUEST['sku'];

$q = $modx->prepare("
    SELECT
        offer.id AS offer_id,
        offer.price,
        offer.article,
        offer.color,
        offer.size,
		offer.weight,
        offer.count,
        product_Thumb.url AS thumb
    FROM (SELECT * FROM {$modx->getTableName('mstoOffer')} ORDER BY CASE WHEN article = '{$article}' THEN 1 ELSE 2 END, price ASC) AS offer
    LEFT JOIN {$modx->getTableName('mstoOfferFile')} AS offer_File ON offer_File.color = offer.color
    LEFT JOIN {$modx->getTableName('msProductFile')} AS product_Thumb ON offer_File.image_id = product_Thumb.parent AND product_Thumb.path = '{$product_id}/{$thumbnail_size}/'
    WHERE offer.product_id = {$product_id} AND offer.active = 1
    GROUP BY offer.color
");
if(!$q->execute()) return;
if($offers = $q->fetchAll(PDO::FETCH_ASSOC)){
	$i = 0;
	// выбор активного товара по артикулу
	if($article) foreach($offers as $key => $_offer) if ($_offer['article'] == $article) $i = $key;

	$offer = array_merge($offers[$i], array(
	  'sizes' => array(),
	  'colors' => $colors,
	  'gallery' => array(),
	));

	if(!$msto->config['show_weight']) unset($offer['weight']);
	if(!$msto->config['show_count']) unset($offer['count']);

	// цвета
	foreach($offers as $index => $_offer){
	    $offer['colors'][$_offer['color']] = array(
	        'thumb' => $_offer['thumb'],
	        'active' => $_offer['color'] == $offer['color'] ? true : false,
	    );
	}

	// размеры
	if($msto->config['show_size']){
		$offers = $modx->getIterator('mstoOffer', array(
		    'color' => $offer['color'],
		    'product_id' => $modx->resource->id,
		));
		foreach($offers as $idx => $_offer){
		    $offer['sizes'][] = array(
		        'size' => $_offer->size,
		        'price' => $_offer->price,
		        'article' => $_offer->article,
		        'active' => $_offer->article == $offer['article'] ? true : false,
		    );
		}
	}

	// галерея
	$q = $modx->prepare("
	    SELECT
	        product_File.url AS original,
	        product_Thumb.url AS thumb
	    FROM {$modx->getTableName('mstoOfferFile')} AS offer_File
	    LEFT JOIN {$modx->getTableName('msProductFile')} AS product_File ON offer_File.image_id = product_File.id
	    LEFT JOIN {$modx->getTableName('msProductFile')} AS product_Thumb ON offer_File.image_id = product_Thumb.parent AND product_Thumb.path = '{$product_id}/{$thumbnail_size}/'
	    WHERE offer_File.product_id = {$modx->resource->id} AND offer_File.color = '{$offer[color]}'
	    ORDER BY product_File.rank ASC
	");
	if(!$q->execute()) return;
	$offer['gallery'] = $q->fetchAll(PDO::FETCH_ASSOC);
}else{
	$product = $modx->getObject('msProduct', $product_id);
	$offer = array(
		'article' => $product->get('article'),
		'weight' =>  $msto->config['show_weight'] ? $product->get('weight') : '',
	);
}

if(empty($offer['gallery'])){
	$q = $modx->prepare("
    		SELECT
			product_Thumb.url AS thumb,
			product_File.url AS original
		FROM {$modx->getTableName('msProductFile')} AS product_Thumb
		 LEFT JOIN {$modx->getTableName('msProductFile')} AS product_File ON product_File.id = product_Thumb.parent
		WHERE product_Thumb.product_id = '{$product_id}' AND product_Thumb.path = '{$product_id}/{$thumbnail_size}/'
	");
	if(!$q->execute()) return;
	$offer['gallery'] = $q->fetchAll(PDO::FETCH_ASSOC);
}

return $offer;