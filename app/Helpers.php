<?php

//自定义函数

function str_summary($str, $chars = 10)
{
    $len = 2 * $chars;
    $str = strip_tags($str);
    $str = iconv('UTF-8', 'GBK', $str);

    if (strlen($str) > $len)
    {
        $str = substr($str, 0, $len);
        $str .= '...';
    }

    $str = iconv('GBK', 'UTF-8//IGNORE', $str);

    return $str;
}
