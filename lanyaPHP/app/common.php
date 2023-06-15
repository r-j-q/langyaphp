<?php
//图片地址 加上当前域名
if (!function_exists('isHttp')) {
    function isHttp($url = '')
    {
        if (!$url) return $url;
        if (strstr($url, 'http')) return $url;
        if (strstr($url, "http") || strstr($url, "https")) {
            return $url;
        } else {
            return getHttp() . '://' . $_SERVER['HTTP_HOST'] . $url;
        }
    }
}
if (!function_exists('getHttp')) {
    function getHttp($value = '')
    {
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https' : 'http';
        return $http_type;
    }
}


function get_week($time = '', $format='Y-m-d'){

    $time = $time != '' ? $time : time();
    //获取当前周几
    $week = date('w', $time);

    $date = [];
    for ($i=1; $i<=7; $i++){
        $date[$i] = date($format ,strtotime( '+' . ($i-$week) .' days', $time));
    }
    return $date;
}

function get_month($time){
    $j = date("t",$time); //获取当前月份天数
    $start_time = strtotime(date('Y-m-01',$time)); //获取本月第一天时间戳
    $array = array();
    for($i=0;$i<$j;$i++){
        $array[] = date('Y-m-d',$start_time+$i*86400); //每隔一天赋值给数组
    }
    return $array;
}
