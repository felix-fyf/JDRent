<?php

namespace JDRent\Support\Security;

use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Constant\SignTypeEnum;
use JDRent\Support\Constant\KeyTypeEnum;

class AksPlatformSecurity
{
    /**
     * @param $encryptType
     * @param $srcData
     * @param $encryCert
     * @return array
     * @throws \Exception
     */
    public static function encrypt($encryptType, $srcData, $encryCert)
    {
        $result = array();
        if ($encryptType == EncryptTypeEnum::DES_RSA) {
            $result['encrypt'] = DeviceCryptoService::encrypt_envelop($srcData, $encryCert);
        } else if ($encryptType == EncryptTypeEnum::NONE) {
            $result['encrypt'] = $srcData;
        } else {
            throw new \Exception("not support encrypt type is " . $encryptType);
        }
        return $result;
    }

    public static function decrypt()
    {

    }

    public static function sign()
    {

    }

    /**
     * @param $verifyType
     * @param $data
     * @param $signature
     * @param $verifyCert
     * @param null $digestSalt
     * @return bool
     * @throws \Exception
     */
    public static function verify($verifyType, $data, $signature, $verifyCert, $digestSalt = null)
    {
        if ($verifyType == SignTypeEnum::SHA256withRSA) {
            return DeviceCryptoService::p1_verify($data, $signature, $verifyCert);
        } else {
            throw new \Exception("not support verify type is " . $verifyType);
        }
    }
}
