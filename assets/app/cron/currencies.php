<?php
	/*скрипт для обновления курса валют по крону*/
	define('MODX_API_MODE', true);
	require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');
	$modx=new modX();
	$modx->initialize('web');
	
	$DailyExRates = simplexml_load_file('http://www.nbrb.by/Services/XmlExRates.aspx');;
  foreach($DailyExRates->Currency as $valutes){
  	if ($valutes->CharCode == 'EUR') {
  		$Setting = $modx->getObject('modSystemSetting', 'EUR');
			$Setting->set('value', $valutes->Rate);
			$Setting->save();
  	}
  	if ($valutes->CharCode == 'RUB') {
			$Setting = $modx->getObject('modSystemSetting', 'RUB');
			$Setting->set('value', $valutes->Rate);
			$Setting->save();
  	}
  }
  $modx->cacheManager->refresh(array('system_settings' => array()));
  echo 'success';
  
  
  
  
