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

    /**
     * @param string $str
     * @param int $length
     * @param bool $encode
     * @return string
     */
    public static function cut(string $str, $length = 200, $encode = true): string
    {
        $str = strip_tags($str);
        $str = str_replace('&nbsp;', '', $str);
        if($encode)
            $str = htmlspecialchars($str, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8', false);
        if(mb_strlen($str) > $length) {
            $str = mb_substr($str, 0, $length);
            $str = rtrim($str, "!,.-");
            $str = mb_substr($str, 0, strrpos($str, ' '));
            $str = $str."… ";
        }
        return $str;
    }
}