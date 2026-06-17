<?php

namespace JDRent\Support\Security;

use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Constant\SignTypeEnum;

error_reporting(E_ERROR);
ini_set("display_errors", "Off");

class TripleDesUtil
{
    /**
     * 3des加密
     * @param $data
     * @param $key
     * @return string
     */
    public static function encrypt($data, $key)
    {
        return base64_encode(openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_PKCS1_PADDING));
    }

    /**
     * 3des解密
     * @param $data
     * @param $key
     * @return string
     */
    public static function decrypt($data, $key)
    {
        return base64_encode(openssl_decrypt($data, 'DES-EDE3', $key, OPENSSL_PKCS1_PADDING));
    }
}
