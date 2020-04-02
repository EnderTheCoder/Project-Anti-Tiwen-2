<?php

$content = null;
exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=%D6%DC%F0%D8&bj1=4%B0%E0&nj1=%B8%DF%D2%BB' -H 'Cookie: hehejt=yhjl=checked&nj=%B8%DF%D2%BB&mima=g1004&bj=4&username=%D6%DC%F0%D8; ASPSESSIONIDSSQTBBCT=HIFKMAGCEMKMMFPIKBHFMMGO' -H 'Upgrade-Insecure-Requests: 1' --data 'xm=%D6%DC%F0%D8&nj=%B8%DF%D2%BB&bj=4%B0%E0&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=36.5&xg=%CC%E1%BD%BB'", $content);
$final = '';
for ($i = 0; $i < count($content); $i++) {
    $final .= $content[$i] . "\n";
}
echo iconv("gb2312", "utf-8", $final);