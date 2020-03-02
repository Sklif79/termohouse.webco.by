<?php
$params_count = array(
    'parents' => 18,
    'limit' => 1,
    'tpl' => 'latest_news',
    'sortdir' => 'DESC'
);


$latest_news_data = $modx->runSnippet('pdoResources',$params_count);


$date = new DateTime($latest_news_data);
$date->modify('+10 day');
$latest_news_data =  $date->format('d-m-Y') . "\n";


$new_latest_day = date("d-m-Y");



if ($latest_news_data > $new_latest_day){
	
   echo "active_latest_news_link";
    
}else{
	
    //echo "NO GO!";  
}
return;
