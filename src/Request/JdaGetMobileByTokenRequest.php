<?php

namespace JDRent\Request;

class JdaGetMobileByTokenRequest
{
    private $apiParas = array();

    public function getApiMethodName()
    {
        return "jingdong.jda.getMobileByToken";
    }

    public function getApiParas()
    {
        if (empty($this->apiParas)) {
            return "{}";
        }
        return $this->apiParas;
    }

    public function check()
    {
    }

    public function putOtherTextParam($key, $value)
    {
        $this->apiParas[$key] = $value;
        $this->$key = $value;
    }

    private $version;

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

    private $appId;

    public function setAppId($appId)
    {
        $this->appId = $appId;
        $this->apiParas["app_id"] = $appId;
    }

    public function getAppId()
    {
        return $this->appId;
    }
}