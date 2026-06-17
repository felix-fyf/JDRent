<?php

namespace JDRent\Config;

class Config
{
    // 应用ID，用户ID和应用ID一致，用户类型默认0
    private $appId = '';
    // 服务端密钥系统类型
    private $jddKeyType = '';
    // 服务端公钥
    private $openPublicKey = '';
    // 客户端私钥
    private $appPrivateKey = '';
    // 加密算法
    private $encryptType = '';
    // 加签算法
    private $signType = '';
    // 盐值
    private $md5Salt = '';
    // 用户类型
    private $appIdType = "0";
    // 服务端调用地址
    private $server = '';

    /**
     * @param string $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @return string
     */
    public function getJddKeyType()
    {
        return $this->jddKeyType;
    }

    /**
     * @param string $jddKeyType
     */
    public function setJddKeyType($jddKeyType)
    {
        $this->jddKeyType = $jddKeyType;
    }

    /**
     * @return string
     */
    public function getOpenPublicKey()
    {
        return $this->openPublicKey;
    }

    /**
     * @param string $openPublicKey
     */
    public function setOpenPublicKey($openPublicKey)
    {
        $this->openPublicKey = $openPublicKey;
    }

    /**
     * @return string
     */
    public function getAppPrivateKey()
    {
        return $this->appPrivateKey;
    }

    /**
     * @param string $appPrivateKey
     */
    public function setAppPrivateKey($appPrivateKey)
    {
        $this->appPrivateKey = $appPrivateKey;
    }

    /**
     * @return string
     */
    public function getEncryptType()
    {
        return $this->encryptType;
    }

    /**
     * @param string $encryptType
     */
    public function setEncryptType($encryptType)
    {
        $this->encryptType = $encryptType;
    }

    /**
     * @return string
     */
    public function getSignType()
    {
        return $this->signType;
    }

    /**
     * @param string $signType
     */
    public function setSignType($signType)
    {
        $this->signType = $signType;
    }

    /**
     * @return string
     */
    public function getMd5Salt()
    {
        return $this->md5Salt;
    }

    /**
     * @param string $md5Salt
     */
    public function setMd5Salt($md5Salt)
    {
        $this->md5Salt = $md5Salt;
    }

    /**
     * @return string
     */
    public function getAppIdType()
    {
        return $this->appIdType;
    }

    /**
     * @param string $appIdType
     */
    public function setAppIdType($appIdType)
    {
        $this->appIdType = $appIdType;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param string $server
     */
    public function setServer($server)
    {
        $this->server = $server;
    }
}
