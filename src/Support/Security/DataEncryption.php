<?php

namespace JDRent\Support\Security;

class DataEncryption
{
    const CIPHER_METHOD_AES_128_CBC = 'aes-128-cbc';
    const CIPHER_BLOCK_SIZE = 16;
    const CIPHER_IV_SIZE = 16;
    const CIPHER_KEY_SIZE = 16;

    private $iv;
    private $key;

    /**
     * DataEncryption constructor.
     * @param string|null $key 加密密钥，如果为null则自动生成
     */
    public function __construct($key = null)
    {
        $this->iv = self::secureRandom(self::CIPHER_IV_SIZE);

        if ($key == null) {
            $this->key = self::secureRandom(self::CIPHER_KEY_SIZE);
        } else {
            $this->key = $key;
        }
    }

    /**
     * 导出密钥
     * @return string
     */
    public function exportKey()
    {
        return $this->key;
    }

    /**
     * 导出初始化向量
     * @return string
     */
    public function exportIv()
    {
        return $this->iv;
    }

    /**
     * 加密数据
     * @param string $pt 明文
     * @return string 密文（IV + 加密数据）
     */
    public function encrypt($pt)
    {
        $ct_data = openssl_encrypt($pt, self::CIPHER_METHOD_AES_128_CBC, $this->key, OPENSSL_RAW_DATA, $this->iv);
        $ct = $this->iv . $ct_data;

        return $ct;
    }

    /**
     * 解密数据
     * @param string $ct 密文（IV + 加密数据）
     * @return string 明文
     */
    public function decrypt($ct)
    {
        $this->iv = substr($ct, 0, self::CIPHER_IV_SIZE);
        $ct_data = substr($ct, self::CIPHER_IV_SIZE, strlen($ct) - self::CIPHER_IV_SIZE);
        $pt = openssl_decrypt($ct_data, self::CIPHER_METHOD_AES_128_CBC, $this->key, OPENSSL_RAW_DATA, $this->iv);

        if ($pt === false) {
            throw new \RuntimeException("Decrypt fail.");
        }

        return $pt;
    }

    /**
     * 生成安全的随机字节
     * @param int $octets 字节数
     * @return string 随机字节
     */
    public static function secureRandom($octets)
    {
        try {
            return \openssl_random_pseudo_bytes($octets);
        } catch (\Exception $ex) {
            throw new \RuntimeException('Your system does not have a secure random number generator.');
        }
    }

    /**
     * 使用指定密钥加密数据
     * @param string $pt 明文
     * @param string $key 密钥
     * @return string base64编码的密文
     */
    public static function encryptWithKey($pt, $key)
    {
        $encryption = new self($key);
        $ct = $encryption->encrypt($pt);
        return base64_encode($ct);
    }

    /**
     * 使用指定密钥解密数据
     * @param string $ct base64编码的密文
     * @param string $key 密钥
     * @return string 明文
     */
    public static function decryptWithKey($ct, $key)
    {
        $encryption = new self($key);
        $ct = base64_decode($ct);
        return $encryption->decrypt($ct);
    }
}