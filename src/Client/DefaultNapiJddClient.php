<?php

namespace JDRent\Client;

use JDRent\Support\Security\SecretKeyPlatformSecurity;
use JDRent\Support\Security\SecurityServiceFactory;
use JDRent\Support\Util\MapSortUtil;
use JDRent\Support\Constant\Constants;

class DefaultNapiJddClient
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 获取并解析请求的业务数据
     * @param $serverRequest
     * @return bool|string
     * @throws \Exception
     */
    public function getBizContent($serverRequest)
    {
        $jrgwEnvKey = $serverRequest->getJrgwEnvKey();
        $bizContent = SecretKeyPlatformSecurity::decrypt($serverRequest->getGwEncryptType(), $serverRequest->getEncrypt(), $this->config->getAppPrivateKey(), $jrgwEnvKey);

        $notifyMap = $this->convertNotifyMap($serverRequest->getJrgwNotifyNo(), $serverRequest->getJrgwRequestTime(), $bizContent, $jrgwEnvKey);
        $signText = MapSortUtil::formatWithFixedPreAndKeysNoEmpty($notifyMap, Constants::SIGNSTR_FIRST_SPLICE, Constants::SIGNSTR_SECOND_SPLICE, Constants::SIGNSTR_FIXED_PRE, array(Constants::BIZ_CONTENT));
        $securityService = SecurityServiceFactory::getSecurityService($this->config->getJddKeyType());
        $flag = $securityService::verify($this->config->getSignType(), $signText, base64_decode($serverRequest->getGwSign()), $this->config->getOpenPublicKey(), $this->config->getMd5Salt());
        if (!$flag) {
            throw new \Exception('verify sign error!');
        }
        return $bizContent;
    }

    private function convertNotifyMap($jrgwNotifyNo, $jrgwRequestTime, $bizContent, $jrgwEnvKey)
    {
        $notifyMap = array();
        $notifyMap[Constants::JRGW_NOTIFY_NO] = $jrgwNotifyNo;
        $notifyMap[Constants::JRGW_REQUEST_TIME] = $jrgwRequestTime;
        $notifyMap[Constants::BIZ_CONTENT] = $bizContent;
        if (!empty($jrgwEnvKey)) {
            $notifyMap[Constants::JRGW_ENV_KEY] = $jrgwEnvKey;
        }
        return $notifyMap;
    }

    /**
     * 获取HTTP请求头
     * @param $request
     * @return array
     */
    public function getRequestHeader($request)
    {
        $headers = array();
        foreach ($request as $key => $value) {
            if ('HTTP_' == substr($key, 0, 5)) {
                $headers[str_replace('_', '-', substr($key, 5))] = $value;
            }
        }
        return $headers;
    }
}
