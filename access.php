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
$task = new task_core();

//新用户入表
if (isset($_SERVER['REMOTE_ADDR'])) {
    $result = $mysql->bind_query('SELECT * FROM main_white_list WHERE ip_addr = ?', $_SERVER['REMOTE_ADDR']);
    if (!$mysql->fetchLine('ip_addr'))
        $mysql->bind_query('INSERT INTO main_white_list(ip_addr) VALUES (?)', $_SERVER['REMOTE_ADDR']);

//邀请链接生效
//if (!isEmpty($_GET['i'])) {
//    $mysql->bind_query('SELECT * FROM main_white_list WHERE id = ?', $_GET['i']);
//    if ($mysql->fetchLine('ip_addr') && !$mysql->fetchLine('invite_ip') && $mysql->fetchLine('ip_addr') != $_SERVER['REMOTE_ADDR']) {
//        $mysql->bind_query('UPDATE main_white_list SET invite_ip = ? WHERE id = ?', array(
//            1 => $_SERVER['REMOTE_ADDR'],
//            2 => $mysql->fetchLine('id')
//        ));
//    }
//}

//更新用户访问数和agent

    $mysql->bind_query('UPDATE main_white_list SET cnt = cnt + 1, http_user_agent = ?, update_time = ? WHERE ip_addr = ?', array(
        1 => $_SERVER['HTTP_USER_AGENT'],
        2 => time(),
        3 => $_SERVER['REMOTE_ADDR']
    ));
}

$mysql->bind_query('SELECT update_time FROM main_tasks WHERE id = 1');

$return->retMsg('success', array(
    'announcement' => getSetting('announcement'),
    'update_time' => time() - $mysql->fetchLine('update_time'),
));
