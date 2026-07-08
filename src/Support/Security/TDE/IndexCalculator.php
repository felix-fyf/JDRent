<?php

namespace JDRent\Support\Security\TDE;

class IndexCalculator
{
    /**
     * 计算SHA256索引
     * @param string $pt 输入数据
     * @param string $salt 盐值
     * @return string 索引值
     * @throws \InvalidArgumentException
     */
    public static function sha256Index($pt, $salt)
    {
        if ($pt == null) {
            throw new \InvalidArgumentException("Input is null for sha256Index function.");
        } elseif ($salt != null && strlen($salt) >= 16) {
            $data = $pt . $salt;
            $md = hash("sha256", $data, true);
            return $md;
        } else {
            throw new \InvalidArgumentException("Salt length is too short.");
        }
    }
}
