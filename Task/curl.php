<?php
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/Data/return_core.php';
require 'Core/custom_functions.php';

$mysql = new mysql_core();

$headers = array(
    "Content-type: application/x-www-form-urlencoded",
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
    "Cache-Control: private",
);

function curl_post($url, $data, $headers, $cookies)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_COOKIE, "hehejt=yhjl=checked&nj=%B8%DF%D2%BB&mima=g1004&bj=4&username=%B7%EB%EE%DA%DC%F5; ASPSESSIONIDSSQTBBCT=HIFKMAGCEMKMMFPIKBHFMMGO");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}

//$post_fields = 'xm=' . urlencode(iconv("utf-8", "gb2312", "冯钰荃")) .
//    '&nj=' . urlencode(iconv("utf-8", "gb2312", "高一")) .
//    '&bj=' . urlencode(iconv("utf-8", "gb2312", "4班")) .
//    '&jtzz=' . urlencode(iconv("utf-8", "gb2312", "地址隐藏")) .
//    '&sfcx=' . urlencode(iconv("utf-8", "gb2312", "否")) .
//    '&cxdd=&fhsj=&glts=&gldd=' .
//    '&mrtw=36.5' .
//    '&xg=' . urlencode(iconv("utf-8", "gb2312", "提交"));

while (1) {
    $result = $mysql->bind_query('SELECT * FROM name_list');
    for ($i = 0; $i < count($result); $i++) {
        $post_fields = $post_fields = 'xm=' . urlencode(iconv("utf-8", "gb2312", $result[$i]['name'])) .
            '&nj=' . urlencode(iconv("utf-8", "gb2312", $result[$i]['grade'])) .
            '&bj=' . urlencode(iconv("utf-8", "gb2312", $result[$i]['class'])) .
            '&jtzz=' . urlencode(iconv("utf-8", "gb2312", "地址隐藏")) .
            '&sfcx=' . urlencode(iconv("utf-8", "gb2312", "否")) .
            '&cxdd=&fhsj=&glts=&gldd=' .
            '&mrtw= ' . $result[$i]['tem'] .
            '&xg=' . urlencode(iconv("utf-8", "gb2312", "提交"));
        try {
            $content = iconv('GB2312', 'UTF-8', curl_post(
                'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp',
                $post_fields,
                $headers,
                urlencode(iconv("utf-8", "gb2312", $result[$i]['name']))));

        } catch (Exception $exception) {
            $content = $exception->getMessage();
        }
        $mysql->bind_query('INSERT INTO main_logs (name, return_value, time) VALUES (?,?,?)', array(
            1 => $result[$i]['name'],
            2 => $content,
            3 => time()
        ));
        sleep(1);
    }
    sleep(3600);
}
