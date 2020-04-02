<?php
require 'Core/Task/task_core.php';
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/custom_functions.php';
require 'Core/Data/return_core.php';
$task = new task_core();
$return = new return_core();
//echo $task->create_('test', 'curl.php', 'test');
if (!$task->check_(1))
    $task->start_(1, __DIR__);
$return->retMsg('success', $task->check_(1));