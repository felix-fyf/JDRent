<?php

namespace JDRent\Support\Util;

class DateUtil
{
    /**
     * 获取当前毫秒时间戳(13位)
     * @return float
     */
    public static function msectime()
    {
        list($msec, $sec) = explode(' ', microtime());
        return $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }

    /**
     * 获取当前时间精确到毫秒（yyyyMMddHHmmssSSS）
     */
    public static function getMicrosecondTime()
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return date('YmdHis') . substr($msectime, -3);
    }
}
