<?php

namespace JDRent\Support\Util;

class StringUtil
{
    /**
     * 判断字符串是否为空
     * @param $str
     * @return bool
     */
    public static function isEmpty($str)
    {
        return (($str == null) || (strlen($str) <= 0) || (strlen(trim($str)) <= 0));
    }
}
