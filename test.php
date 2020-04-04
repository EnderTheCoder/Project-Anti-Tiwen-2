<?php
require 'Core/DB/MySQL/mysql_core.php';
require 'Core/Data/return_core.php';
require 'Core/custom_functions.php';

function get_together($arr)
{
    $content = '';
    for ($i = 0; $i < count($arr); $i++)
        $content .= $arr[$i] . "\n";
    return iconv("gb2312", "utf-8", $content);
}


$post_fields = array(
    'name' => urlencode(iconv("utf-8", "gb2312", "冯钰荃")),
    'class' => urlencode(iconv("utf-8", "gb2312", "高一")),
    'grade' => urlencode(iconv("utf-8", "gb2312", "4班")),
    'tem' => "36." . rand(0, 9),
);
$arr = null;

exec("curl 'http://gl.lyd24zx.com/xsyqbb/xsyq.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Upgrade-Insecure-Requests: 1' --cookie-jar cookie.txt", $arr);
echo get_together($arr);
exec("curl 'http://gl.lyd24zx.com/xsyqbb/xsyq_qr.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/xsyq.asp' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1' --data 'username=" . $result[$i]['name'] . "&nj=" . $result[$i]['grade'] . "&bj=4&mima=g1004&qr2=%C8%B7%B6%A8'", $arr);
echo get_together($arr);
exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $result[$i]['name'] . "&bj1=" . $result[$i]['class'] . "&nj1=" . $result[$i]['grade'] . "' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/xsyq_qr.asp' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1'", $arr);
echo get_together($arr);
exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $result[$i]['name'] . "&bj1=" . $result[$i]['class'] . "&nj1=" . $result[$i]['grade'] . "' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1' --data 'xm=" . $result[$i]['name'] . "&nj=" . $result[$i]['grade'] . "&bj=" . $result[$i]['class'] . "&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=" . $result[$i]['tem'] . "&xg=%CC%E1%BD%BB'", $arr);
echo get_together($arr);


//if (count($arr) != 6 || !iconv("gb2312", "utf-8", $arr[3]) == "   alert(\"上报内容已经保存，返回\")") {
//    echo "errrrrrrrrrrrrrr\n";
//}

