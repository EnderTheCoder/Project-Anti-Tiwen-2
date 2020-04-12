<?php
require __DIR__ . '/../Core/DB/MySQL/mysql_core.php';
require __DIR__ . '/../Core/Data/return_core.php';
require __DIR__ . '/../Core/custom_functions.php';

function get_together($arr)
{
    $content = '';
    for ($i = 0; $i < count($arr); $i++)
        $content .= $arr[$i] . "\n";
    return iconv("gb2312", "utf-8", $content);
}

$mysql = new mysql_core();

while (1) {
    $timer_a = time();
    $result = $mysql->bind_query('SELECT * FROM name_list');
    $failed = 0;
    for ($i = 0; $i < count($result); $i++) {
        $password = 'g';
        switch ($result[$i]['grade']) {
            case '高一':
            {
                $password .= "10";
                break;
            }
            case '高二':
            {
                $password .= "20";
                break;
            }
            case '高三':
            {
                $password .= "30";
                break;
            }
        }
        $class = strstr($result[$i]['class'], '班', true);
        if ($class < 10) $password .= "0" . $class;
        else $password .= $class;
        $post_fields = array(
            'name' => urlencode(iconv("utf-8", "gb2312", $result[$i]['name'])),
            'class' => urlencode(iconv("utf-8", "gb2312", $result[$i]['class'])),
            'grade' => urlencode(iconv("utf-8", "gb2312", $result[$i]['grade'])),
            'tem' => ($result[$i]['tem'] == 'random') ? "36." . rand(0, 9) : $result[$i]['tem'],
        );
        $arr = array();
        exec("curl 'http://gl.lyd24zx.com/xsyqbb/xsyq.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Upgrade-Insecure-Requests: 1' --cookie-jar cookie.txt", $arr[0]);
//        echo get_together($arr[0]);
        exec("curl 'http://gl.lyd24zx.com/xsyqbb/xsyq_qr.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/xsyq.asp' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1' --data 'username=" . $post_fields['name'] . "&nj=" . $post_fields['grade'] . "&bj=" . $class . "&mima=" . $password . "&qr2=%C8%B7%B6%A8'", $arr[1]);
        echo get_together($arr[1]);
        if (count($arr[1]) != 7 || iconv("gb2312", "utf-8", $arr[1][3]) != "   alert(\"登陆成功！\")") {
            echo iconv("gb2312", "utf-8", $arr[1][3]);
            echo "\n";
            $mysql->bind_query('INSERT INTO main_err_log (time, name, data, failed_dot) VALUES (?, ?, ?, ?)', array(
                1 => time(),
                2 => $result[$i]['name'],
                3 => get_together($arr[1]),
                4 => 0,
            ));
            $failed++;
            continue;
        }
        exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $post_fields['name'] . "&bj1=" . $post_fields['class'] . "&nj1=" . $post_fields['grade'] . "' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/xsyq_qr.asp' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1'", $arr[2]);
//        echo get_together($arr[2]);
        exec("curl 'http://gl.lyd24zx.com/xsyqbb/yqtwsb_add.asp' -H 'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:74.0) Gecko/20100101 Firefox/74.0' -H 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8' -H 'Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2' --compressed -H 'Content-Type: application/x-www-form-urlencoded' -H 'Origin: http://gl.lyd24zx.com' -H 'DNT: 1' -H 'Connection: keep-alive' -H 'Referer: http://gl.lyd24zx.com/xsyqbb/yqtwsb.asp?xm1=" . $post_fields['name'] . "&bj1=" . $post_fields['class'] . "&nj1=" . $post_fields['grade'] . "' -b @cookie.txt -H 'Upgrade-Insecure-Requests: 1' --data 'xm=" . $post_fields['name'] . "&nj=" . $post_fields['grade'] . "&bj=" . $post_fields['class'] . "&jtzz=%B5%D8%D6%B7%D2%FE%B2%D8&sfcx=%B7%F1&cxdd=&fhsj=&glts=&gldd=&mrtw=" . $post_fields['tem'] . "&xg=%CC%E1%BD%BB'", $arr[3]);
        echo get_together($arr[3]);
        if (count($arr[3]) != 6 || iconv("gb2312", "utf-8", $arr[3][3]) != "   alert(\"上报内容已经保存，返回\");") {
            echo "ERROR!!!\n";
            echo iconv("gb2312", "utf-8", $arr[3][3]);
            echo "\n";
            $mysql->bind_query('INSERT INTO main_err_log (time, name, data, failed_dot) VALUES (?, ?, ?, ?)', array(
                1 => time(),
                2 => $result[$i]['name'],
                3 => get_together($arr[3]),
                4 => 1,
            ));
            $failed++;
            continue;
        }
        $mysql->bind_query('UPDATE name_list SET cnt = cnt + 1 WHERE name = ?', $result[$i]['name']);
    }
    $timer_b = time();
    $mysql->bind_query('INSERT INTO main_roll_log(time_spent, start_time, end_time, cnt_all, cnt_failed) VALUES (?, ?, ?, ?, ?)', array(
        1 => $timer_b - $timer_a,
        2 => $timer_a,
        3 => $timer_b,
        4 => count($result),
        5 => $failed,
    ));

    $sleep = getSetting('sleep');
    echo 'Program will sleep for ' . $sleep . 's';
    sleep(getSetting('sleep'));
}