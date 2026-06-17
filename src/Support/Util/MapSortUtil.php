<?php

namespace JDRent\Support\Util;

class MapSortUtil
{
    /**
     * 对MAP中的固定前缀的KEY按字典序排序，按排序后顺序对KEY和VALUE格式化拼接输出,VALUE为空时不参与排序拼接
     * @param array $map
     * @param $firSplice
     * @param $secSplice
     * @param $fixedPre
     * @param array $otherKey
     * @return false|string
     */
    public static function formatWithFixedPreAndKeysNoEmpty(array $map, $firSplice, $secSplice, $fixedPre, array $otherKey)
    {
        $keyset = array_keys($map);
        asort($keyset);
        $formatStr = '';
        foreach ($keyset as $key) {
            if (substr($key, 0, strlen($fixedPre)) === $fixedPre ||
                ($otherKey != null && sizeof($otherKey) > 0 && in_array($key, $otherKey))) {
                if ($map[$key] != null && $map[$key] != '') {
                    $formatStr .= $key . $firSplice . $map[$key] . $secSplice;
                }
            }
        }
        $formatStr = substr($formatStr, 0, strlen($formatStr) - 1);
        return $formatStr;
    }
}
