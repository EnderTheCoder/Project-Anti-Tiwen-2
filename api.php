<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:application/json; charset=utf-8');
require 'Core/Task/task_core.php';
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/Data/return_core.php';
require 'Core/custom_functions.php';

$return = new return_core();
$mysql = new mysql_core();


if (isEmpty($_POST['name']) || isEmpty($_POST['class']) || isEmpty($_POST['grade']) || isEmpty($_POST['tem']))
    $return->retMsg('emptyParam');

//判定是否在白名单内
$mysql->bind_query('SELECT * FROM main_white_list WHERE ip_addr = ?', $_SERVER['REMOTE_ADDR']);
if (!$mysql->fetchLine('invite_ip')) {
    $return->retMsg('noResult', '您的ip不在本站的白名单中,请将以下链接分享给一位新用户打开即可立即解锁 
    http://ender.yishugou.shop/Project-Anti-Tiwen-2/?i=' . $mysql->fetchLine('id'));
}

$mysql->bind_query('SELECT * FROM name_list WHERE name = ?', $_POST['name']);

if (!$mysql->fetchLine('name')) {
    $params = array(
        1 => $_POST['name'],
        2 => $_POST['class'],
        3 => time(),
        4 => $_POST['grade'],
        5 => $_POST['tem'],
    );
    $mysql->bind_query('INSERT INTO name_list(name, class, time, grade, tem) VALUES (?,?,?,?,?)', $params);
} else {
    if ($mysql->fetchLine('lock')) $return->retMsg('passErr');
    $mysql->bind_query('UPDATE name_list SET tem = ?, class = ?, grade = ? WHERE name = ?', array(
        1 => $_POST['tem'],
        2 => $_POST['class'],
        3 => $_POST['grade'],
        4 => $_POST['name'],
    ));
}

$return->retMsg('success');
