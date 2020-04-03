<?php
require __DIR__ . '/../Core/DB/MySQL/mysql_core.php';
require __DIR__ . '/../Core/Data/return_core.php';
require __DIR__ . '/../Core/custom_functions.php';

$mysql = new mysql_core();

while (1) {
    $result = $mysql->bind_query('SELECT * FROM name_list');
    for ($i = 0; $i < count($result); $i++) {
        $post_fields = array(
            'name' => urlencode(iconv("utf-8", "gb2312", $result[$i]['name'])),
            'class' => urlencode(iconv("utf-8", "gb2312", $result[$i]['class'])),
            'grade' => urlencode(iconv("utf-8", "gb2312", $result[$i]['grade'])),
            'tem' => $result[$i]['tem'],
        );
        var_dump($post_fields);
        $arr = null;

//        exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $post_fields['name'] . "&bj1=".$post_fields['class']."&nj1=".$post_fields['grade']."' -H 'Cookie:  ASPSESSIONIDSSQTBBCT=HIFKMAGCEMKMMFPIKBHFMMGO' -H 'Upgrade-Insecure-Requests: 1' --data 'xm=" . $post_fields['name'] . "&nj=".$post_fields['grade']."&bj=".$post_fields['class']."&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=".$post_fields['tem']."&xg=%CC%E1%BD%BB'", $arr);
        exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $post_fields['name'] . "&bj1=".$post_fields['class']."&nj1=".$post_fields['grade']."' -H 'Cookie: ASPSESSIONIDSSQTBBCT=HIFKMAGCEMKMMFPIKBHFMMGO;  ASPSESSIONIDSQQTDBDS=JFFNKMCDNCNLECEBFHMODKEN' -H 'Upgrade-Insecure-Requests: 1' --data 'xm=" . $post_fields['name'] . "&nj=".$post_fields['grade']."&bj=".$post_fields['class']."&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=".$post_fields['tem']."&xg=%CC%E1%BD%BB'", $arr);
        $mysql->bind_query('INSERT INTO main_logs (name, return_value, time) VALUES (?,?,?)', array(
            1 => $result[$i][0],
            2 => (iconv("gb2312", "utf-8",$arr[3]) == "   alert(\"上报内容已经保存，返回\")"),
            3 => time()
        ));
        sleep(1);
    }
    sleep(1000);
}
