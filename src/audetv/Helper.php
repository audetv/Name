<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 27.12.2018
 * Time: 21:48
 */

namespace audetv;


class Helper
{
    public static function ucfirst($str, $encoding = 'UTF-8')
    {
        return trim(mb_substr(mb_strtoupper($str, $encoding), 0, 1, $encoding) . mb_substr($str, 1, mb_strlen($str) - 1, $encoding));
    }

    public static function initial(string $str, $encoding = 'UTF-8')
    {
        return trim(mb_substr(Helper::ucfirst($str, $encoding), 0, 1, $encoding));
    }
}