<?php

namespace JDRent\Client;

use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Constant\Constants;
use JDRent\Support\Security\SecurityServiceFactory;
use JDRent\Support\Security\SecretKeyPlatformSecurity;
use JDRent\Support\Util\MapSortUtil;

class DefaultSpiJddClient
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function callback($httpServletRequest, $spiResponse)
    {
        try {
            $gwEncryptType = $httpServletRequest->getGwEncryptType();
            $signType = $httpServletRequest->getSignType();

            $resultParams = $spiResponse['resultParams'];

            $securityService = SecurityServiceFactory::getSecurityService($this->config->getJddKeyType());
            $envelopeMap = $securityService::encrypt($gwEncryptType, $resultParams, $this->config->getOpenPublicKey());
            $envelope = $envelopeMap['envelope'];
            $encrypt = $envelopeMap['encrypt'];
            $responseHeaders = array();
            $responseHeaders[Constants::GW_ENCRYPT_TYPE] = $gwEncryptType;
            $responseHeaders[Constants::JRGW_RESPOND_TIME] = $spiResponse['respondTime'];
            $responseHeaders[Constants::JRGW_RESP_CODE] = $spiResponse['code'];
            $responseHeaders[Constants::JRGW_RESP_MSG] = urlencode($spiResponse['msg']);
            if (!empty($envelope)) {
                $responseHeaders[Constants::JRGW_RESP_ENV_KEY] = $envelope;
            }

            $signText = $this->join4SignString4Response($resultParams, $responseHeaders);
            $sign = SecretKeyPlatformSecurity::sign($signType, $signText, $this->config->getAppPrivateKey(), $this->config->getMd5Salt());

            $responseHeaders[Constants::GW_SIGN] = $sign;

            if ($gwEncryptType == EncryptTypeEnum::NONE) {
                $resultMap = json_encode(array('biz-content' => $encrypt));
            } else {
                $resultMap = json_encode(array('encrypt' => $encrypt));
            }
            $result = [
                "http_body" => $resultMap,
                "http_headers" => $responseHeaders
            ];
            return $result;
        } catch (\Exception $e) {
            echo $e;
        }
        return null;
    }

    private function join4SignString4Response($encrypt, $respondHeader)
    {
        $joinSignMap = $this->convertCallBackJoinSignMap($respondHeader, $encrypt);
        return MapSortUtil::formatWithFixedPreAndKeysNoEmpty($joinSignMap, Constants::SIGNSTR_FIRST_SPLICE, Constants::SIGNSTR_SECOND_SPLICE, Constants::SIGNSTR_FIXED_PRE, array(Constants::BIZ_CONTENT));
    }

    private function convertCallBackJoinSignMap($respondHeader, $bizContent)
    {
        return [
            Constants::JRGW_RESP_CODE => $respondHeader[Constants::JRGW_RESP_CODE],
            Constants::JRGW_RESP_MSG => urldecode($respondHeader[Constants::JRGW_RESP_MSG]),
            Constants::JRGW_RESPOND_TIME => $respondHeader[Constants::JRGW_RESPOND_TIME],
            Constants::JRGW_RESP_ENV_KEY => $respondHeader[Constants::JRGW_RESP_ENV_KEY],
            Constants::BIZ_CONTENT => $bizContent
        ];
    }

    public function receive($httpServletRequest)
    {
        try {
            $jrgwEnvKey = $httpServletRequest->getJrgwEnvKey();
            $bizContent = SecretKeyPlatformSecurity::decrypt($httpServletRequest->getGwEncryptType(), $httpServletRequest->getEncrypt(), $this->config->getAppPrivateKey(), $jrgwEnvKey);

            $join4SignMap = $this->convertJoin4SignMap($httpServletRequest->getJrgwRequestTime(), $bizContent, $this->config->getAppId(), $this->config->getAppIdType(), $jrgwEnvKey);
            $signText = MapSortUtil::formatWithFixedPreAndKeysNoEmpty($join4SignMap, Constants::SIGNSTR_FIRST_SPLICE, Constants::SIGNSTR_SECOND_SPLICE, Constants::SIGNSTR_FIXED_PRE, array(Constants::BIZ_CONTENT));
            $securityService = SecurityServiceFactory::getSecurityService($this->config->getJddKeyType());
            $flag = $securityService::verify($this->config->getSignType(), $signText, base64_decode($httpServletRequest->getGwSign()), $this->config->getOpenPublicKey(), $this->config->getMd5Salt());
            if (!$flag) {
                throw new \Exception('verify sign error!');
            }
            return $bizContent;
        } catch (\Exception $e) {
            echo $e;
        }
        return null;
    }

    private function convertJoin4SignMap($jrgwRequestTime, $bizContent, $appId, $appIdType, $jrgwEnvKey)
    {
        return [
            Constants::JRGW_ENTERPRISE_USER_ID => $appId,
            Constants::JRGW_USER_ID_TYPE => $appIdType,
            Constants::JRGW_REQUEST_TIME => $jrgwRequestTime,
            Constants::BIZ_CONTENT => $bizContent,
            Constants::JRGW_ENV_KEY => $jrgwEnvKey,
        ];
    }
}
