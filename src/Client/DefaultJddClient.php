<?php

namespace JDRent\Client;

use JDRent\Support\Security\SecretKeyPlatformSecurity;
use JDRent\Support\Constant\EncryptTypeEnum;
use JDRent\Support\Util\DateUtil;
use JDRent\Support\Security\SecurityServiceFactory;
use JDRent\Support\Models\SdkResponse;

class DefaultJddClient
{
    // 连接超时时间（单位s）
    public $connectTimeout = 10;
    // 请求超时时间（单位s）
    public $socketTimeout = 30;
    // 客户端配置信息
    private $config;

    public function __construct($config, $connectTimeout = 10, $socketTimeout = 30)
    {
        $this->config = $config;
        $this->connectTimeout = $connectTimeout;
        $this->socketTimeout = $socketTimeout;
    }

    private function curlInit($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->socketTimeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        return $ch;
    }

    private function getReqCheckSignData($reqData, $appId, $jrgwEnvKey, $requestTime, $userIdType)
    {
        $result = "biz-content=" . $reqData . "&jrgw-enterprise-user-id=" . $appId;
        if (!empty($jrgwEnvKey)) {
            $result = $result . '&jrgw-env-key=' . $jrgwEnvKey;
        }
        $result = $result . "&jrgw-request-time=" . $requestTime . "&jrgw-user-id-type=" . $userIdType;
        return $result;
    }

    private function organizeHeaders($config, $requestTime, $sign, $envelope)
    {
        $headers = array();
        $headers[] = 'jrgw-request-time: ' . $requestTime;
        $headers[] = 'gw-encrypt-type: ' . $config->getEncryptType();
        $headers[] = 'jrgw-enterprise-user-id: ' . $config->getAppId();
        $headers[] = 'jrgw-user-id-type: ' . $config->getAppIdType();
        $headers[] = 'gw-sign-type: ' . $config->getSignType();
        $headers[] = 'gw-sign: ' . $sign;
        if (!empty($envelope)) {
            $headers[] = 'jrgw-env-key: ' . $envelope;
        }
        return $headers;
    }

    private function join4SignString4Response($respData, $respHeaders)
    {
        $result = "biz-content=" . $respData . "&jrgw-resp-code=" . $respHeaders["jrgw-resp-code"];
        if (!empty($respHeaders["jrgw-resp-env-key"])) {
            $result = $result . "&jrgw-resp-env-key=" . $respHeaders["jrgw-resp-env-key"];
        }
        $result = $result . "&jrgw-resp-msg=" . urldecode($respHeaders["jrgw-resp-msg"]) . "&jrgw-respond-time=" . $respHeaders["jrgw-respond-time"];
        return $result;
    }

    /**
     * @param $req
     * @param $apiMethod
     * @return SdkResponse
     * @throws \Exception
     */
    public function execute($req, $apiMethod)
    {
        $result = null;
        $ch = null;
        try {
            $ch = $this->curlInit($this->config->getServer() . $apiMethod);
            $reqData = json_encode($req);
            $requestTime = DateUtil::getMicrosecondTime();
            $securityService = SecurityServiceFactory::getSecurityService($this->config->getJddKeyType());
            $envelopeMap = $securityService::encrypt($this->config->getEncryptType(), $reqData, $this->config->getOpenPublicKey());
            $envelope = $envelopeMap['envelope'];
            $base64EncodeStr = $envelopeMap['encrypt'];

            $signData = self::getReqCheckSignData($reqData, $this->config->getAppId(), $envelope, $requestTime, $this->config->getAppIdType());
            $sign = SecretKeyPlatformSecurity::sign($this->config->getSignType(), $signData, $this->config->getAppPrivateKey(), $this->config->getMd5Salt());

            $headers = self::organizeHeaders($this->config, $requestTime, $sign, $envelope);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            if ($this->config->getEncryptType() == EncryptTypeEnum::NONE) {
                $entity = array('biz-content' => $base64EncodeStr);
            } else {
                $entity = array('encrypt' => $base64EncodeStr);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($entity));
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch), 0);
            } else {
                $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                if (200 !== $httpStatusCode) {
                    throw new \Exception($response, $httpStatusCode);
                }
            }

            $respHeaders = $this->getRespHeaders($response, $ch);
            $encrypt = $this->getEntity($response, $ch, $this->config->getEncryptType());
            if (empty($encrypt)) {
                return new SdkResponse($respHeaders['jrgw-resp-code'],
                    $respHeaders['jrgw-resp-msg'] == null ? null : urldecode($respHeaders['jrgw-resp-msg']),
                    $result,
                    $respHeaders["jrgw-respond-time"]);
            }
            $result = SecretKeyPlatformSecurity::decrypt($this->config->getEncryptType(), $encrypt, $this->config->getAppPrivateKey(), $respHeaders['jrgw-resp-env-key']);

            $signData = self::join4SignString4Response($result, $respHeaders);
            $flag = $securityService::verify($this->config->getSignType(), $signData, base64_decode($respHeaders["gw-sign"]), $this->config->getOpenPublicKey(), $this->config->getMd5Salt());
            if (!$flag) {
                throw new \Exception("验签失败");
            }
            return new SdkResponse($respHeaders['jrgw-resp-code'], urldecode($respHeaders['jrgw-resp-msg']), $result, $respHeaders["jrgw-respond-time"]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        } finally {
            if (!empty($ch)) {
                curl_close($ch);
            }
        }
    }

    private function getEntity($response, $ch, $encryptType)
    {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $result = substr($response, $headerSize);
        if (EncryptTypeEnum::NONE == $encryptType) {
            return json_decode(str_replace("-", "_", $result))->biz_content;
        }
        return json_decode($result)->encrypt;
    }

    private function getRespHeaders($response, $ch)
    {
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $output = substr($response, 0, $headerSize);

        $respHeaders = array();

        $data = explode("\n", $output);
        array_shift($data);
        foreach ($data as $part) {
            $middle = explode(":", $part);
            if(count($middle)<2){
                continue;
            }
            $respHeaders[trim($middle[0])] = trim($middle[1]);
        }
        return $respHeaders;
    }
}
