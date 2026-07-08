<?php

namespace JDRent\Support\Security\TDE;

class KeyEncryption
{
    const RANDOM_SIZE = 16;
    const ZERO_IV = "\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00";

    /**
     * 加密数据
     * @param MKey $mkey 密钥对象
     * @param string $pt 明文
     * @return string 密文
     * @throws \RuntimeException
     */
    public static function encrypt($mkey, $pt)
    {
        $rsec = Crypto::secureRandom(self::RANDOM_SIZE);
        $iv = str_pad($rsec, Crypto::CIPHER_IV_SIZE, "\x00");

        $ct_data = openssl_encrypt($pt, Crypto::CIPHER_METHOD_AES_128_CBC, $mkey->getKey(), OPENSSL_RAW_DATA, $iv);
        if ($ct_data === false) {
            throw new \RuntimeException("Key encryption error. Cipher method: " . Crypto::CIPHER_METHOD_AES_128_CBC);
        }

        $ct = $rsec . $ct_data;

        return $ct;
    }

    /**
     * 解密数据
     * @param MKey $mkey 密钥对象
     * @param string $ct 密文
     * @return string 明文
     * @throws \RuntimeException
     */
    public static function decrypt($mkey, $ct)
    {
        $rsec = substr($ct, 0, self::RANDOM_SIZE);
        $ct_data = substr($ct, self::RANDOM_SIZE, strlen($ct) - self::RANDOM_SIZE);
        $iv = str_pad($rsec, Crypto::CIPHER_IV_SIZE, "\x00");

        $pt = openssl_decrypt($ct_data, Crypto::CIPHER_METHOD_AES_128_CBC, $mkey->getKey(), OPENSSL_RAW_DATA, $iv);

        if ($pt === false) {
            throw new \RuntimeException("Key decryption error. Cipher method: " . Crypto::CIPHER_METHOD_AES_128_CBC);
        }

        return $pt;
    }

    /**
     * 包装密钥
     * @param MKey $mkey 密钥对象
     * @param string $dkey 数据密钥
     * @return string 包装后的密钥
     * @throws \RuntimeException
     */
    public static function wrap($mkey, $dkey)
    {
        $ct = openssl_encrypt(
            $dkey,
            Crypto::CIPHER_METHOD_AES_128_CBC,
            $mkey->getKey(),
            OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
            self::ZERO_IV
        );
        if ($ct === false) {
            throw new \RuntimeException("Key encryption error. Cipher method: " . Crypto::CIPHER_METHOD_AES_128_CBC);
        }

        return $ct;
    }

    /**
     * 解包密钥
     * @param MKey $mkey 密钥对象
     * @param string $ct 密文
     * @return string 解包后的密钥
     * @throws \RuntimeException
     */
    public static function unwrap($mkey, $ct)
    {
        $pt = openssl_decrypt(
            $ct,
            Crypto::CIPHER_METHOD_AES_128_CBC,
            $mkey->getKey(),
            OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
            self::ZERO_IV
        );
        if ($pt === false) {
            throw new \RuntimeException("Key decryption error, Cipher method: " . Crypto::CIPHER_METHOD_AES_128_CBC);
        }

        return $pt;
    }
}
