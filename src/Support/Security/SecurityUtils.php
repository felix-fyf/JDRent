<?php

namespace JDRent\Support\Security;

use JDRent\Support\Security\Rsa\RSA;
use JDRent\Support\Constant\Constants;
use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Util\MapSortUtil;

class SecurityUtils
{
    /**
     * 生成签名串
     * @param array $paramMap
     * @return false|string
     */
    public static function getSignString(array $paramMap)
    {
        $list = array();
        $list[] = 'biz-content';
        return MapSortUtil::formatWithFixedPreAndKeysNoEmpty($paramMap, Constants::SIGNSTR_FIRST_SPLICE,
            Constants::SIGNSTR_SECOND_SPLICE, Constants::SIGNSTR_FIXED_PRE, $list);
    }

    /**
     * 加签
     * @param $data
     * @param $privateKey
     * @param $digestSalt
     * @return string
     */
    public static function sign($data, $privateKey, $digestSalt)
    {
        $rsa = new RSA();
        $rsa->signatureMode = 2;
        $rsa->loadKey($privateKey);
        $signature = $rsa->sign_with_md5_then_rsa($data, $digestSalt);
        return base64_encode($signature);
    }

    public static function verify($data, $signValue, $publicKey, $digestSalt)
    {
        $rsa = new RSA();
        $rsa->signatureMode = 2;
        $rsa->loadKey($publicKey);
        return $rsa->verify_with_md5_then_rsa($data, $digestSalt, $signValue);
    }

    public static function subEncryptByPublicKey($data, $publicKey, $asyCipherAl)
    {
        $result = '';
        try {
            if ($asyCipherAl == EncryptTypeEnum::RSA) {
                $result = RSAUtils::subEncryptByPublicKey($data, $publicKey);
            }
        } catch (\Exception $e) {
            throw $e;
        }
        return $result;
    }

    public static function subDecryptByPrivateKey($data, $privateKey, $asyCipherAl)
    {
        $result = '';
        try {
            if ($asyCipherAl == EncryptTypeEnum::RSA) {
                $result = RSAUtils::subDecryptByPrivateKey($data, $privateKey);
            }
        } catch (\Exception $e) {
            throw $e;
        }
        return $result;
    }

    /**
     * 信封模式一步解密
     * @param $data
     * @param $key
     * @param $privateKey
     * @return false|string
     */
    public static function decryptWithEnvelope($data, $key, $privateKey)
    {
        $syKey = RSAUtils::decryptByPrivateKey($key, $privateKey);
        $res = TripleDesUtil::decrypt(base64_decode($data), $syKey);
        return base64_decode($res);
    }

    /**
     * 信封模式一步加密
     * @param $data
     * @param $publicKey
     * @return array
     */
    public static function encryptWithEnvelope($data, $publicKey)
    {
        $syKey = openssl_random_pseudo_bytes(24);
        $syKey = base64_encode($syKey);
        $encryptByte = TripleDesUtil::encrypt($data, base64_decode($syKey));
        $envelopeByte = RSAUtils::encryptByPublicKey($syKey, $publicKey);
        $result = array();
        $result['envelope'] = $envelopeByte;
        $result['encrypt'] = $encryptByte;
        return $result;
    }
}
