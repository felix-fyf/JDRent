<?php

namespace JDRent\Support\Security\TDE;

abstract class KStoreType
{
    const ENC_STORE = 0;
    const DEC_STORE = 1;
}

final class CacheKeyStore
{
    private $encKeyStore;
    private $decKeyStore;
    private $futureKeyIds;

    public function __construct()
    {
        $this->encKeyStore = array();
        $this->decKeyStore = array();
        $this->futureKeyIds = array();
    }

    /**
     * 通过索引搜索解密密钥
     * @param string $mkIndex 密钥索引
     * @return MKey|null
     */
    public function searchDeckey($mkIndex)
    {
        if (array_key_exists(base64_encode($mkIndex), $this->decKeyStore)) {
            return $this->decKeyStore[base64_encode($mkIndex)];
        } else {
            return null;
        }
    }

    /**
     * 获取指定类型的密钥数量
     * @param int $kstoreType 密钥存储类型
     * @return int
     */
    public function numOfKeys($kstoreType)
    {
        if ($kstoreType == KStoreType::ENC_STORE) {
            return sizeof($this->encKeyStore);
        } else {
            return sizeof($this->decKeyStore);
        }
    }

    /**
     * 通过版本获取加密密钥
     * @param int $keyVersion 密钥版本
     * @return MKey|null
     */
    public function getEncKeyByVersion($keyVersion)
    {
        foreach ($this->encKeyStore as $key => $value) {
            if ($value->getVersion() == $keyVersion) {
                return $value;
            }
        }
        return null;
    }

    /**
     * 更新密钥缓存
     * @param string $b64Index base64编码的索引
     * @param MKey $mkey 密钥对象
     * @param int $kstoreType 密钥存储类型
     * @return void
     */
    public function updateKey($b64Index, $mkey, $kstoreType)
    {
        if ($kstoreType == KStoreType::ENC_STORE) {
            if (!array_key_exists($b64Index, $this->encKeyStore)) {
                $this->encKeyStore[$b64Index] = $mkey;
            } else {
                if ($this->encKeyStore[$b64Index]->getKeyStatus() != $mkey->getKeyStatus()) {
                    $this->encKeyStore[$b64Index] = $mkey;
                }
            }
        } else {
            if (!array_key_exists($b64Index, $this->decKeyStore)) {
                $this->decKeyStore[$b64Index] = $mkey;
            } else {
                if ($this->decKeyStore[$b64Index]->getKeyStatus() != $mkey->getKeyStatus()) {
                    $this->decKeyStore[$b64Index] = $mkey;
                }
            }
        }
    }

    /**
     * 移除所有密钥
     * @return void
     */
    public function removeAllMKeys()
    {
        $this->encKeyStore = array();
        $this->decKeyStore = array();
    }

    /**
     * 通过列表移除密钥
     * @param array $target 目标列表
     * @param int $kstoreType 密钥存储类型
     * @return void
     */
    public function removeKeysViaList($target, $kstoreType)
    {
        foreach ($target as $t) {
            if ($kstoreType == KStoreType::ENC_STORE) {
                unset($this->encKeyStore[$t]);
            } else {
                unset($this->decKeyStore[$t]);
            }
        }
    }

    /**
     * 获取密钥ID列表
     * @param int $kstoreType 密钥存储类型
     * @return array
     */
    public function getKeyIDList($kstoreType)
    {
        if ($kstoreType == KStoreType::ENC_STORE) {
            return array_keys($this->encKeyStore);
        } else {
            return array_keys($this->decKeyStore);
        }
    }

    /**
     * 重置未来密钥ID
     * @return void
     */
    public function resetFutureKeyIDs()
    {
        $this->futureKeyIds = array();
    }

    /**
     * 更新未来密钥ID
     * @param string $service 服务名
     * @param int $maxVer 最大版本
     * @return void
     */
    public function updateFutureKeyIDs($service, $maxVer)
    {
        // TODO: 实现更新未来密钥ID
    }

    /**
     * 检查是否包含指定的未来密钥ID
     * @param string $keyid 密钥ID
     * @return bool
     */
    public function hasFutureKeyID($keyid)
    {
        return array_key_exists(base64_encode($keyid), $this->futureKeyIds);
    }
}
