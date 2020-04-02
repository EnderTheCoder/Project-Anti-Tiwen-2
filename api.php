<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Content-Type:application/json; charset=utf-8');
require 'Core/Task/task_core.php';
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/Data/return_core.php';
require 'Core/custom_functions.php';

//$headers = array(
//    "Content-type: application/x-www-form-urlencoded",
//    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
//    "Cache-Control: private",
//);
//
//function curl_post($url, $data, $headers)
//{
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_HEADER, 0);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl, CURLOPT_POST, 1);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($curl, CURLOPT_COOKIE, "ASPSESSIONIDSSQTBBCT=HIFKMAGCEMKMMFPIKBHFMMGO");
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//    $data = curl_exec($curl);
//    curl_close($curl);
//    return $data;
//}
//$post_fields = 'xm='.urlencode(iconv("utf-8", "gb2312", "冯钰荃")).
//    '&nj='.urlencode(iconv("utf-8", "gb2312", "高一")).
//    '&bj='.urlencode(iconv("utf-8", "gb2312", "4班")).
//    '&jtzz='.urlencode(iconv("utf-8", "gb2312", "地址隐藏")).
//    '&sfcx='.urlencode(iconv("utf-8", "gb2312", "否")).
//    '&cxdd=&fhsj=&glts=&gldd='.
//    '&mrtw=36.5'.
//    '&xg='.urlencode(iconv("utf-8", "gb2312", "提交"))
//;
//echo $post_fields;
//echo "\n";
//echo 'xm=%B7%EB%EE%DA%DC%F5&nj=%B8%DF%D2%BB&bj=4%B0%E0&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=36.5&xg=%CC%E1%BD%BB';
//echo "\n";
//$data = array(
//    'xm' => urlencode(iconv("utf-8", "gb2312", "冯钰荃")),
//    'nj' => urlencode(iconv("utf-8", "gb2312", "高一")),
//    'bj' => urlencode(iconv("utf-8", "gb2312", "四班")),
//    'jtzz' => urlencode(iconv("utf-8", "gb2312", "地址隐藏")),
//    'sfcx' => urlencode(iconv("utf-8", "gb2312", "否")),
//    'cxdd' => '',
//    'fhsj' => '',
//    'glts' => '',
//    'gldd' => '',
//    'mrtv' => urlencode(iconv("utf-8", "gb2312", "36.5")),
//    'xg' => urlencode(iconv("utf-8", "gb2312", "提交")),
//);
////var_dump($data);
//echo iconv('GB2312', 'UTF-8', curl_post('http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp', $post_fields, $headers));
//
////echo curl_post('http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp', $data);


$return = new return_core();
$mysql = new mysql_core();

if (isEmpty($_POST['name']) || isEmpty($_POST['class']) || isEmpty($_POST['grade']) || isEmpty($_POST['tem']))
    $return->retMsg('emptyParam');

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
