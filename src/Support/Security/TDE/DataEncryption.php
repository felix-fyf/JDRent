<?php

namespace JDRent\Support\Security\TDE;

class DataEncryption
{
    private $iv;
    private $key;

    /**
     * DataEncryption constructor.
     * @param string|null $key 加密密钥，如果为null则自动生成
     */
    public function __construct($key = null)
    {
        $this->iv = Crypto::secureRandom(Crypto::CIPHER_IV_SIZE);

        if ($key == null) {
            $this->key = Crypto::secureRandom(Crypto::CIPHER_KEY_SIZE);
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
        $ct_data = openssl_encrypt($pt, Crypto::CIPHER_METHOD_AES_128_CBC, $this->key, OPENSSL_RAW_DATA, $this->iv);
        $ct = $this->iv . $ct_data;

        return $ct;
    }

    /**
     * 解密数据
     * @param string $ct 密文（IV + 加密数据）
     * @return string 明文
     * @throws \RuntimeException
     */
    public function decrypt($ct)
    {
        $this->iv = substr($ct, 0, Crypto::CIPHER_IV_SIZE);
        $ct_data = substr($ct, Crypto::CIPHER_IV_SIZE, strlen($ct) - Crypto::CIPHER_IV_SIZE);
        $pt = openssl_decrypt($ct_data, Crypto::CIPHER_METHOD_AES_128_CBC, $this->key, OPENSSL_RAW_DATA, $this->iv);

        if ($pt === false) {
            throw new \RuntimeException("Decrypt fail.");
        }

        return $pt;
    }
}
