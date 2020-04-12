<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:application/json; charset=utf-8');
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/Data/return_core.php';
require 'Core/custom_functions.php';

$return = new return_core();
$mysql = new mysql_core();
if (isEmpty($_GET['limit']) || isEmpty($_GET['page'])) $return->retMsg('emptyParam');
$count = $mysql->getCount('main_roll_log');
var_dump($count);
$sql = 'SELECT * FROM main_roll_log ORDER BY id LIMIT ?';
//0 1 2
//3 4 5
$result = $mysql->bind_query('SELECT * FROM `main_roll_log` LIMIT ?', $_GET['limit'] * ($_GET['page'] - 1) + $_GET['limit']);
var_dump($result);
var_dump($mysql->fetchLine('id'));
$return->setType('success');
$return->setData($result);
$return->setCount();
$return->run();