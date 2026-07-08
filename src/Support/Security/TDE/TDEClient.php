<?php

namespace JDRent\Support\Security\TDE;

/**
 * TDE客户端
 * 支持通过accessToken、appKey、appSecret获取密钥并进行加密解密
 */
final class TDEClient
{
    const version = "php 1.0.7-simple";
    const salt = "\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00";
    const keyWordSalt = "\x00\x01\x02\x03\x04\x05\x06\x07\x08\x09\x0A\x0B\x0C\x0D\x0E\x0F\x10\x11\x12\x13\x14\x15\x16\x17\x18\x19\x1A\x1B\x1C\x1D\x1E\x1F";

    /**
     * @var CacheKeyStore
     */
    private $cache_ks;

    /**
     * 密钥版本
     * @var int
     */
    private $majorKeyVersion = 0;

    /**
     * 服务名
     * @var string
     */
    private $service;

    /**
     * Token ID
     * @var string
     */
    private $tokenId;

    /**
     * Token Key
     * @var string
     */
    private $tokenKey;

    /**
     * 实例缓存
     * @var array
     */
    private static $instances = array();

    /**
     * TDEClient constructor.
     * @param string $tokenId token ID
     * @param string $tokenKey token key
     * @param string $service 服务名
     */
    public function __construct($tokenId, $tokenKey, $service = 'default')
    {
        $this->service = $service;
        $this->tokenId = $tokenId;
        $this->tokenKey = $tokenKey;
        $this->cache_ks = new CacheKeyStore();
    }

    /**
     * 获取TDEClient实例（静态方法）
     * @param string $accessToken 用户授权token
     * @param string $appKey 应用ID
     * @param string $appSecret 应用秘钥
     * @param string $serverUrl 服务器地址
     * @return TDEClient
     * @throws \RuntimeException
     */
    public static function getInstance($accessToken, $appKey, $appSecret, $serverUrl = 'https://api.jd.com/routerjson')
    {
        // 检查缓存
        if (isset(self::$instances[$accessToken])) {
            $instance = self::$instances[$accessToken];
            // 检查密钥是否已加载
            if (!$instance->isKeyChainReady()) {
                $instance->fetchKeys($appKey, $appSecret, $serverUrl);
            }
            return $instance;
        }

        // 请求voucher获取token
        $tokenData = self::requestVoucher($accessToken, $appKey, $appSecret, $serverUrl);

        // 创建实例
        $instance = new self($tokenData['id'], $tokenData['key'], $tokenData['service']);

        // 获取密钥
        $instance->fetchKeys($appKey, $appSecret, $serverUrl);

        // 缓存实例
        self::$instances[$accessToken] = $instance;

        return $instance;
    }

    /**
     * 请求voucher
     * @param string $accessToken 用户授权token
     * @param string $appKey 应用ID
     * @param string $appSecret 应用秘钥
     * @param string $serverUrl 服务器地址
     * @return array token数据
     * @throws \RuntimeException
     */
    private static function requestVoucher($accessToken, $appKey, $appSecret, $serverUrl)
    {
        // 构建请求参数
        $params = array(
            '360buy_param_json' => json_encode(array(
                'access_token' => $accessToken
            )),
            'app_key' => $appKey,
            'access_token' => $accessToken,
            'timestamp' => date('Y-m-d H:i:s'),
            'v' => '2.0',
            'method' => 'jingdong.jos.voucher.info.get',
        );

        // 生成签名
        $params['sign'] = self::generateSign($params, $appSecret);

        // 发送请求
        $response = self::httpPost($serverUrl, $params);

        // 解析响应
        $responseObj = json_decode($response);
        if (!$responseObj) {
            throw new \RuntimeException('Invalid response format');
        }

        // 获取voucher
        $responseKey = 'jingdong_jos_voucher_info_get_responce';
        if (!isset($responseObj->$responseKey)) {
            throw new \RuntimeException('Invalid response structure');
        }

        $voucherResponse = $responseObj->$responseKey;
        if (isset($voucherResponse->code) && $voucherResponse->code != 0) {
            throw new \RuntimeException('Request failed: ' . (isset($voucherResponse->zh_desc) ? $voucherResponse->zh_desc : 'Unknown error'));
        }

        if (!isset($voucherResponse->response)) {
            throw new \RuntimeException('Invalid response structure');
        }

        $res = $voucherResponse->response;
        if (isset($res->error_code) && $res->error_code != '0') {
            throw new \RuntimeException('Request failed: ' . (isset($res->error_msg) ? $res->error_msg : 'Unknown error'));
        }

        if (!isset($res->data->voucher)) {
            throw new \RuntimeException('Voucher not found in response');
        }

        // 解析voucher
        $voucherStr = base64_decode($res->data->voucher);
        $voucher = json_decode($voucherStr);

        if (!$voucher || !isset($voucher->data)) {
            throw new \RuntimeException('Invalid voucher format');
        }

        $data = $voucher->data;
        $id = $data->id;
        $key = $data->key;
        $service = isset($data->service) ? $data->service : 'default';

        return array(
            'id' => $id,
            'key' => $key,
            'service' => $service
        );
    }

    /**
     * 获取密钥
     * @param string $appKey 应用ID
     * @param string $appSecret 应用秘钥
     * @param string $serverUrl 服务器地址
     * @return void
     * @throws \RuntimeException
     */
    public function fetchKeys($appKey, $appSecret, $serverUrl)
    {
        // 构建签名数据
        $ts = time() * 1000;
        $signData = json_encode(array(
            'sdk_ver' => 1,
            'ts' => $ts,
            'tid' => $this->tokenId
        ));

        // 使用token key签名
        $sig = base64_encode(hash_hmac('sha256', $signData, base64_decode($this->tokenKey), true));

        // 构建请求参数
        $params = array(
            '360buy_param_json' => json_encode(array(
                'sig' => $sig,
                'tid' => $this->tokenId,
                'ts' => $ts,
                'sdk_ver' => 1
            )),
            'app_key' => $appKey,
            'timestamp' => date('Y-m-d H:i:s'),
            'v' => '2.0',
            'method' => 'jingdong.jos.master.key.get',
        );

        // 生成签名
        $params['sign'] = self::generateSign($params, $appSecret);

        // 发送请求
        $response = self::httpPost($serverUrl, $params);

        // 解析响应
        $responseObj = json_decode($response);
        if (!$responseObj) {
            throw new \RuntimeException('Invalid key response format');
        }

        // 获取密钥响应
        $responseKey = 'jingdong_jos_master_key_get_responce';
        if (!isset($responseObj->$responseKey)) {
            throw new \RuntimeException('Invalid key response structure');
        }

        $keyResponse = $responseObj->$responseKey;
        if (isset($keyResponse->code) && $keyResponse->code != 0) {
            throw new \RuntimeException('Key request failed: ' . (isset($keyResponse->zh_desc) ? $keyResponse->zh_desc : 'Unknown error'));
        }

        if (!isset($keyResponse->response)) {
            throw new \RuntimeException('Invalid key response structure');
        }

        $res = $keyResponse->response;
        if (isset($res->status_code) && $res->status_code != 0) {
            throw new \RuntimeException('Key request failed: ' . (isset($res->errorMsg) ? $res->errorMsg : 'Unknown error'));
        }

        // 导入密钥
        if (isset($res->service_key_list)) {
            $this->importKeys($res->service_key_list);
        }
    }

    /**
     * 导入密钥
     * @param array $serviceKeyList 密钥列表
     * @return void
     */
    private function importKeys($serviceKeyList)
    {
        foreach ($serviceKeyList as $serviceKey) {
            $serviceName = $serviceKey->service;
            $grantUsage = isset($serviceKey->grant_usage) ? $serviceKey->grant_usage : 'ED';
            $currentKeyVersion = isset($serviceKey->current_key_version) ? $serviceKey->current_key_version : 0;

            if (isset($serviceKey->keys)) {
                foreach ($serviceKey->keys as $keyData) {
                    $id = base64_decode($keyData->id);
                    $key = base64_decode($keyData->key_string);
                    $keyDigest = $keyData->key_digest;
                    $version = $keyData->version;
                    $effective = isset($keyData->key_effective) ? $keyData->key_effective : time() * 1000;
                    $expired = isset($keyData->key_exp) ? $keyData->key_exp : (time() + 365 * 24 * 3600) * 1000;
                    $keyType = isset($keyData->key_type) ? $keyData->key_type : 0;
                    $keyStatus = isset($keyData->key_status) ? $keyData->key_status : 0;

                    // 创建MKey
                    $mkey = new MKey(
                        $serviceName,
                        $id,
                        $key,
                        $keyDigest,
                        $version,
                        $effective,
                        $expired,
                        $keyType,
                        $grantUsage,
                        $keyStatus
                    );

                    // 验证密钥
                    if ($mkey->isValid()) {
                        $b64Index = base64_encode($id);

                        // 如果是主服务的密钥，更新到加密和解密缓存
                        if ($serviceName === $this->service) {
                            $this->majorKeyVersion = $currentKeyVersion;
                            $this->cache_ks->updateKey($b64Index, $mkey, KStoreType::ENC_STORE);
                            $this->cache_ks->updateKey($b64Index, $mkey, KStoreType::DEC_STORE);
                        } else {
                            // 其他服务的密钥只更新到解密缓存
                            $this->cache_ks->updateKey($b64Index, $mkey, KStoreType::DEC_STORE);
                        }
                    }
                }
            }
        }
    }

    /**
     * 发送HTTP POST请求
     * @param string $url 请求地址
     * @param array $params 请求参数
     * @return string 响应内容
     * @throws \RuntimeException
     */
    private static function httpPost($url, $params)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 5000);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 5000);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept:application/json',
            'Content-Type:application/x-www-form-urlencoded;charset=UTF-8',
            'Connection:keep-alive'
        ));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \RuntimeException('HTTP request failed: ' . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode != 200) {
            throw new \RuntimeException('HTTP request failed with code: ' . $httpCode);
        }

        return $response;
    }

    /**
     * 生成签名
     * @param array $params 参数
     * @param string $appSecret 应用秘钥
     * @return string 签名
     */
    private static function generateSign($params, $appSecret)
    {
        ksort($params);
        $stringToBeSigned = $appSecret;
        foreach ($params as $k => $v) {
            $stringToBeSigned .= $k . $v;
        }
        $stringToBeSigned .= $appSecret;
        return strtoupper(md5($stringToBeSigned));
    }

    /**
     * 设置主密钥版本
     * @param int $version 密钥版本
     * @return void
     */
    public function setMajorKeyVersion($version)
    {
        $this->majorKeyVersion = $version;
    }

    /**
     * 获取主密钥版本
     * @return int
     */
    public function getMajorKeyVersion()
    {
        return $this->majorKeyVersion;
    }

    /**
     * 计算索引
     * @param string $pt 输入数据
     * @return string 索引值
     * @throws \RuntimeException
     */
    public function calculateIndex($pt)
    {
        $k0 = $this->cache_ks->getEncKeyByVersion(0);
        if ($k0 == null) {
            throw new \RuntimeException("No available keys.");
        }
        $index = null;
        try {
            $computed_salt = KeyEncryption::wrap($k0, self::salt);
            $index = IndexCalculator::sha256Index($pt, $computed_salt);
        } catch (\Exception $e) {
            throw new \RuntimeException("Index calculation error: " . $e->getMessage());
        }
        return $index;
    }

    /**
     * 计算字符串索引
     * @param string $pt 输入数据
     * @return string base64编码的索引值
     */
    public function calculateStringIndex($pt)
    {
        $index = $this->calculateIndex($pt);
        return base64_encode($index);
    }

    /**
     * 加密数据
     * @param string $pt 明文
     * @param string $encoding 编码
     * @return string base64编码的密文
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function encrypt($pt, $encoding = "")
    {
        if ($pt === null) {
            throw new \InvalidArgumentException("Input string pt is null.");
        }

        if ($encoding != null) {
            $pt = mb_convert_encoding($pt, $encoding);
        }

        $k = $this->cache_ks->getEncKeyByVersion($this->majorKeyVersion);

        if ($k == null) {
            throw new \RuntimeException("No available encryption keys.");
        }

        // 检查密钥状态
        $this->checkKeyStatusForEncryption($k);

        $ct = null;
        try {
            $ct = $k->encrypt($pt);
        } catch (\Throwable $e) {
            throw $e;
        }
        return base64_encode($ct);
    }

    /**
     * 解密数据
     * @param string $ct base64编码的密文
     * @param string $encoding 编码
     * @return string 明文
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function decrypt($ct, $encoding = "")
    {
        if ($ct == null) {
            throw new \InvalidArgumentException("Input cipher string base64ct is NULL.");
        }

        $ct = base64_decode($ct);

        // 检查密文并处理异常
        $cipherResult = $this->getCipherResult($ct);

        if ($cipherResult->status === ResultType::UnDecryptable) {
            throw new \RuntimeException("No corresponding decryption keys available.");
        } elseif ($cipherResult->status === ResultType::Malformed) {
            throw new \InvalidArgumentException("Corrupted cipher.");
        }

        // 已通过getCipherResult()双重检查
        $k = $this->cache_ks->searchDeckey($cipherResult->keyid);

        if ($k == null) {
            throw new \RuntimeException("No corresponding decryption keys available.");
        }

        // 检查密钥状态
        $this->checkKeyStatusForDecryption($k);

        $pt = null;
        try {
            $pt = $cipherResult->isStrong ? $k->strong_decrypt($ct) : $k->decrypt($ct);
        } catch (\Throwable $e) {
            throw $e;
        }

        if ($encoding != null) {
            $pt = mb_convert_encoding($pt, $encoding);
        }

        return $pt;
    }

    /**
     * 签名数据
     * @param string $input 输入数据
     * @return string 签名结果
     * @throws \RuntimeException
     */
    public function sign($input)
    {
        $k = $this->cache_ks->getEncKeyByVersion($this->majorKeyVersion);

        if ($k == null) {
            throw new \RuntimeException("No available signing keys.");
        }

        $this->checkKeyStatusForEncryption($k, false);

        $sigData = null;
        try {
            $sigData = $k->sign($input);
        } catch (\Throwable $e) {
            throw $e;
        }

        return $sigData;
    }

    /**
     * 验证签名
     * @param string $input 输入数据
     * @param string $sig 签名
     * @return bool 验证结果
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function verify($input, $sig)
    {
        $sig_decoded = base64_decode($sig);

        if (strlen($sig_decoded) <= Constants::DEFAULT_KEYID_LEN + Constants::DEFAULT_SEED_LEN) {
            throw new \InvalidArgumentException("Corrupted signature with illegal length.");
        }

        $keyid = substr($sig_decoded, 0, Constants::DEFAULT_KEYID_LEN);

        $k = $this->cache_ks->searchDeckey($keyid);

        if ($k == null) {
            throw new \RuntimeException("No corresponding verify keys available.");
        }

        $this->checkKeyStatusForDecryption($k, false);

        $ret = false;

        try {
            $ret = $k->verify($input, $sig);
        } catch (\Throwable $e) {
            throw $e;
        }

        return $ret;
    }

    /**
     * 判断是否为加密数据
     * @param string $ct 密文
     * @return bool
     */
    public function isEncryptionBytesData($ct)
    {
        try {
            if (strlen($ct) < 1) {
                return false;
            }
            $ctype_ = unpack("C", substr($ct, 0, Constants::CIPHER_TYPE_LEN));
            $ctype = $ctype_[1];
            $isStrong = false;
            if ($ctype == Constants::CIPHER_TYPE_LARGE || $ctype == Constants::CIPHER_TYPE_REGULAR) {
                $isStrong = true;
            } elseif ($ctype !== Constants::CIPHER_TYPE_WEAK) {
                return false;
            }
            $mkIdx = $this->extractKeyId($ct, $isStrong);
            if (isset($mkIdx)) {
                return true;
            }
        } catch (\Exception $e) {
            //do nothing
        }
        return false;
    }

    /**
     * 判断字符串是否为加密数据
     * @param string $ct base64编码的密文
     * @return bool
     */
    public function isEncryptionStringData($ct)
    {
        try {
            $ct = base64_decode($ct);
            return $this->isEncryptionBytesData($ct);
        } catch (\Exception $e) {
            //do nothing
        }
        return false;
    }

    /**
     * 获取密文信息
     * @param string $ct 密文
     * @return CipherResult
     */
    public function getCipherResult($ct)
    {
        try {
            if (strlen($ct) < 1) {
                return new CipherResult(ResultType::Malformed, null, false);
            }
            $ctype_ = unpack("C", substr($ct, 0, Constants::ALGO_TYPE_LEN));
            $ctype = $ctype_[1];
            // for weak version
            $flag = false;

            // MalformedException will be thrown if ctype not matched any of cipher type
            if (CipherType::fromValue($ctype) === CipherType::LARGE || CipherType::fromValue($ctype) === CipherType::REGULAR) {
                $flag = true;
            }

            $mkIdx = $this->extractKeyId($ct, $flag);

            if ($mkIdx === null) {
                return new CipherResult(ResultType::Malformed, null, false);
            }
            if ($this->cache_ks->searchDeckey($mkIdx) !== null) {
                return new CipherResult(ResultType::Decryptable, $mkIdx, $flag);
            } elseif ($this->cache_ks->hasFutureKeyID($mkIdx)) {
                return new CipherResult(ResultType::Feasible, $mkIdx, $flag);
            } else {
                return new CipherResult(ResultType::UnDecryptable, $mkIdx, $flag);
            }
        } catch (\Exception $e) {
            // format error or other error
            return new CipherResult(ResultType::Malformed, null, false);
        }
    }

    /**
     * 提取密钥ID
     * @param string $ct 密文
     * @param bool $isStrong 是否为强加密
     * @return string|null
     */
    private function extractKeyId($ct, $isStrong)
    {
        $offset = 0;
        $eid = null;
        // skip ciphertext type
        $offset += 1;
        if ($isStrong) {
            if (strlen($ct) < $offset + 2) {
                return null;
            }
            $eidLen_ = unpack("n", substr($ct, $offset, 2));
            $eidLen = $eidLen_[1];
            $offset += 2;
            // length checking, not enough space
            if (strlen($ct) - 3 < $eidLen) {
                return null;
            }
            $eid = substr($ct, $offset, $eidLen);
        } else {
            // skip algorithm
            $offset += 1;
            // length checking, not enough space
            if (strlen($ct) - 2 < Constants::DEFAULT_KEYID_LEN) {
                return null;
            }
            $eid = substr($ct, $offset, Constants::DEFAULT_KEYID_LEN);
        }
        return $eid;
    }

    /**
     * 检查密钥状态（加密）
     * @param MKey $key 密钥对象
     * @param bool $isEncryption 是否为加密操作
     * @return void
     * @throws \RuntimeException
     */
    private function checkKeyStatusForEncryption($key, $isEncryption = true)
    {
        if ($key == null) {
            if ($isEncryption) {
                throw new \RuntimeException("No available encryption keys.");
            } else {
                throw new \RuntimeException("No available signing keys.");
            }
        }
        // encrypt only for ACTIVE key (status 0)
        if ($key->getKeyStatus() != 0) {
            throw new \RuntimeException("Operate with inactive keys.");
        }

        // usage: N=-1, E=0, D=1, ED=2
        $usage = $key->getKeyUsage();
        if ($usage == -1 || $usage == 1) {
            throw new \RuntimeException("Key permission invalid.");
        }

        // check key timestamp, millis
        $now = date_timestamp_get(new \DateTime()) * 1000;
        if ($key->getExpiredTime() < $now) {
            // 警告：密钥已过期
        }
    }

    /**
     * 检查密钥状态（解密）
     * @param MKey $key 密钥对象
     * @param bool $isDecryption 是否为解密操作
     * @return void
     * @throws \RuntimeException
     */
    private function checkKeyStatusForDecryption($key, $isDecryption = true)
    {
        // check if it's revoked (status 2)
        if ($key->getKeyStatus() === 2) {
            throw new \RuntimeException("Operate with inactive keys.");
        }

        // usage: N=-1, E=0, D=1, ED=2
        $usage = $key->getKeyUsage();
        if ($usage === -1 || $usage === 0) {
            throw new \RuntimeException("Key permission invalid.");
        }

        // check key timestamp
        $now = date_timestamp_get(new \DateTime()) * 1000;
        if ($key->getExpiredTime() < $now) {
            // 警告：密钥已过期
        }
    }

    /**
     * 获取SDK版本
     * @return string
     */
    public static function getSdkVer()
    {
        return self::version;
    }

    /**
     * 检查密钥链是否就绪
     * @return bool
     */
    public function isKeyChainReady()
    {
        return $this->cache_ks->numOfKeys(KStoreType::ENC_STORE) > 0;
    }

    /**
     * 手动删除密钥
     * @return void
     */
    public function manuallyDeletesKeys()
    {
        $this->cache_ks->removeAllMKeys();
    }

    /**
     * 生成客户令牌
     * @param string $customerUserId 客户用户ID
     * @param string $appKey 应用密钥
     * @return string
     */
    public static function generateCustomerToken($customerUserId, $appKey)
    {
        return '_' . $customerUserId . '_' . $appKey;
    }

    /**
     * 转换为JSON
     * @return string
     */
    public function toJson()
    {
        return json_encode(get_object_vars($this));
    }

    /**
     * 清除实例缓存
     * @param string $accessToken 用户授权token
     * @return void
     */
    public static function clearCache($accessToken = null)
    {
        if ($accessToken === null) {
            self::$instances = array();
        } else {
            unset(self::$instances[$accessToken]);
        }
    }
}
