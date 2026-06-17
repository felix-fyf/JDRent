<?php

namespace JDRent\Support\Security;

use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Constant\SignTypeEnum;

class SecretKeyPlatformSecurity
{
    /**
     * @param $encryptType
     * @param $srcData
     * @param $publicKey
     * @return array
     * @throws \Exception
     */
    public static function encrypt($encryptType, $srcData, $publicKey)
    {
        $result = array();
        if ($encryptType == EncryptTypeEnum::RSA) {
            $result['encrypt'] = SecurityUtils::subEncryptByPublicKey($srcData, $publicKey, $encryptType);
        } else if ($encryptType == EncryptTypeEnum::ENV_RSA) {
            $encryptEnv = SecurityUtils::encryptWithEnvelope($srcData, $publicKey);
            $result['envelope'] = $encryptEnv['envelope'];
            $result['encrypt'] = $encryptEnv['encrypt'];
        } else if ($encryptType == EncryptTypeEnum::NONE) {
            $result['encrypt'] = $srcData;
        } else {
            throw new \Exception("not support encrypt type is " . $encryptType);
        }
        return $result;
    }

    /**
     * @param $decryptType
     * @param $decryptData
     * @param $privateKey
     * @param null $jrgwEnvKey
     * @return bool|string
     * @throws \Exception
     */
    public static function decrypt($decryptType, $decryptData, $privateKey, $jrgwEnvKey = null)
    {
        if ($decryptType == EncryptTypeEnum::RSA) {
            return SecurityUtils::subDecryptByPrivateKey($decryptData, $privateKey, $decryptType);
        } else if ($decryptType == EncryptTypeEnum::ENV_RSA || $decryptType == EncryptTypeEnum::DES_RSA) {
            return SecurityUtils::decryptWithEnvelope($decryptData, $jrgwEnvKey, $privateKey);
        } else if ($decryptType == EncryptTypeEnum::NONE) {
            return $decryptData;
        } else {
            throw new \Exception("not support decrypt type is " . $decryptType);
        }
    }

    /**
     * @param $signType
     * @param $signData
     * @param $privateKey
     * @param $digestSalt
     * @return string
     * @throws \Exception
     */
    public static function sign($signType, $signData, $privateKey, $digestSalt)
    {
        if ($signType == SignTypeEnum::MD5_RSA) {
            return SecurityUtils::sign($signData, $privateKey, $digestSalt);
        } else if ($signType == SignTypeEnum::SHA256withRSA) {
            $appPrivateKey = "-----BEGIN RSA PRIVATE KEY-----\n" . $privateKey . "\n-----END RSA PRIVATE KEY-----";
            openssl_sign($signData, $signature, $appPrivateKey, OPENSSL_ALGO_SHA256);
            return base64_encode($signature);
        } else {
            throw new \Exception("not support sign type is " . $signType);
        }
    }

    /**
     * @param $verifyType
     * @param $data
     * @param $signature
     * @param $publicKey
     * @param $digestSalt
     * @return bool
     * @throws \Exception
     */
    public static function verify($verifyType, $data, $signature, $publicKey, $digestSalt)
    {
        if ($verifyType == SignTypeEnum::MD5_RSA) {
            return SecurityUtils::verify($data, $signature, $publicKey, $digestSalt);
        } else {
            throw new \Exception("not support verify type is " . $verifyType);
        }
    }
}
