<?php

$cookie_file = dirname(__FILE__).'/cookie.txt';
//$cookie_file = tempnam("tmp","cookie");
//先获取cookies并保存
$url = "http://gl.lyd24zx.com/xsyqbb/xsyq.asp";
$ch = curl_init($url); //初始化
curl_setopt($ch, CURLOPT_HEADER, 0); //不返回header部分
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //返回字符串，而非直接输出
curl_setopt($ch, CURLOPT_COOKIEJAR,  $cookie_file); //存储cookies
curl_exec($ch);
curl_close($ch);

//使用上面保存的cookies再次访问

$url = "http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file); //使用上面获取的cookies
$response = curl_exec($ch);
curl_close($ch);
echo $response;
