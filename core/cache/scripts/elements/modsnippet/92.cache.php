<?php  return 'switch ($currency) {
	case 1:
		$price = str_replace(\' \', \'\', $price);
		$price = $price * $modx->getOption(\'RUB\') / 100; 
		break;
	case 2:
		$price = str_replace(\' \', \'\', $price);
		$price = $price * $modx->getOption(\'EUR\'); 
		break;
default: return $price;
}
return round($price, 2);
return;
';