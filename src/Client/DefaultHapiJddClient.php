<?php

namespace JDRent\Client;

use JDRent\Support\Util\DateUtil;
use JDRent\Support\Security\SecurityServiceFactory;
use JDRent\Support\Security\SecretKeyPlatformSecurity;

class DefaultHapiJddClient
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getData($reqData)
    {
        $jsonParams = json_encode($reqData);
        $requestTime = DateUtil::msectime();

        $encryptAndSign = $this->gainEncryptAndSign($jsonParams, $requestTime);

        $result = [
            "encrypt" => $encryptAndSign['encrypt'],
            "sign" => $encryptAndSign['sign'],
            "envelope" => $encryptAndSign['envelope'],
            "time" => $requestTime,
            "userId" => $this->config->getAppId(),
            "encryptType" => $this->config->getEncryptType(),
            "signType" => $this->config->getSignType()
        ];

        return $result;
    }

    private function gainEncryptAndSign($reqData, $requestTime = null)
    {
        $securityService = SecurityServiceFactory::getSecurityService($this->config->getJddKeyType());
        $envelopeMap = $securityService::encrypt($this->config->getEncryptType(), $reqData, $this->config->getOpenPublicKey());
        $result['envelope'] = $envelopeMap['envelope'];
        $result['encrypt'] = $envelopeMap['encrypt'];

        $original4Sign = $this->join4SignString($reqData, $requestTime, $result['envelope']);
        $result['sign'] = SecretKeyPlatformSecurity::sign($this->config->getSignType(), $original4Sign, $this->config->getAppPrivateKey(), $this->config->getMd5Salt());
        return $result;
    }

    private function join4SignString($encrypt, $requestTime, $envelope)
    {
        $sb = "biz-content=" . $encrypt . "&jrgw-enterprise-user-id=" . $this->config->getAppId();
        if (!empty($envelope)) {
            $sb = $sb . "&jrgw-env-key=" . $envelope;
        }
        $sb = $sb . "&jrgw-request-time=" . $requestTime . "&jrgw-user-id-type=" . $this->config->getAppIdType();
        return $sb;
    }
}
