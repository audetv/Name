<?php
/**
 * Created by PhpStorm.
 * User: Гусев
 * Date: 28.12.2018
 * Time: 9:41
 */

namespace audetv\Name\helpers;


class StringHelper
{
    /**
     * @param string $str
     * @param string $encoding
     * @return string
     */
    public static function ucfirst(string $str, $encoding = 'UTF-8')
    {
        return trim(mb_substr(mb_strtoupper($str, $encoding), 0, 1, $encoding) . mb_substr($str, 1, mb_strlen($str) - 1, $encoding));
    }

    /**
     * @param string $str
     * @param bool $uc
     * @param string $encoding
     * @return string
     */
    public static function initialLetter(string $str, $uc = true, $encoding = 'UTF-8')
    {
        $str = trim(mb_substr($uc ? self::ucfirst($str, $encoding): $str, 0, 1, $encoding));
        return $str;
    }
}