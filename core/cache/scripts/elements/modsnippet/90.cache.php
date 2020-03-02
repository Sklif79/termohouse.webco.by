<?php  return 'if (!empty($_POST)) {
    // Получаем данные из формы
    $update    = $_POST[\'update\'];
    $currencies = $_POST[\'сurrencies\'];
    
    // Обрабатываем, сравниваем, сохраняем
    if (!empty($update)) {
			
			if(!$docs = $modx->getCollection(\'modResource\', array(
		    \'class_key\' => \'msProduct\' 
			))){return;}
			
			foreach($docs as $doc){
			    $id = $doc->get(\'id\');
					if ($product = $modx->getObject(\'msProduct\', $id)) {
						 	switch ($product->get(\'currency\')) {
							    case 1:
							        $product->set(\'europrice\',$product->get(\'price\') * $modx->getOption(\'RUB\') / 100);
							        $product->set(\'europrice_old\',$product->get(\'old_price\') * $modx->getOption(\'RUB\') / 100);
							        $product->save();
							        break;
							    case 2:
							        $product->set(\'europrice\',$product->get(\'price\') * $modx->getOption(\'EUR\'));
							        $product->set(\'europrice_old\',$product->get(\'old_price\') * $modx->getOption(\'EUR\'));
							        $product->save();
							        break;
							    default:
							    		$product->set(\'europrice\',$product->get(\'price\'));
							        $product->set(\'europrice_old\',$product->get(\'old_price\'));
							        $product->save();
										}
								}
						}
				return \'<span style="color: red;">Успешно обновлено</span>\';
    	}
    
    if (!empty($currencies)) {
			$DailyExRates = simplexml_load_file(\'http://www.nbrb.by/Services/XmlExRates.aspx\');;
		  foreach($DailyExRates->Currency as $valutes){
		  	if ($valutes->CharCode == \'EUR\') {
		  		$Setting = $modx->getObject(\'modSystemSetting\', \'EUR\');
					$Setting->set(\'value\', $valutes->Rate);
					$Setting->save();
		  	}
		  	if ($valutes->CharCode == \'RUB\') {
					$Setting = $modx->getObject(\'modSystemSetting\', \'RUB\');
					$Setting->set(\'value\', $valutes->Rate);
					$Setting->save();
		  	}
		  }
		  $modx->cacheManager->refresh(array(\'system_settings\' => array()));
		  return \'<span style="color: red;">Успешно обновлено</span>\';
    }
    $modx->cacheManager->clearCache();
} else {
    return false;
}
return;
';