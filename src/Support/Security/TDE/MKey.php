<?php

namespace JDRent\Support\Security\TDE;

class MKey
{
    const IV_SIZE = 16;
    const RANDOM_SIZE = 4;
    const KEY_ID_LEN = 16;
    const MEGABYTE = 1048576;

    private $id;
    private $key;
    private $ver;
    private $service;
    private $keyUsage;
    private $keyType;
    private $skey;
    private $svkey;
    private $isValid;
    private $effective;
    private $expired;
    private $key_digest;
    private $keyStatus;

    public function __construct(
        $service,
        $kid,
        $key,
        $kdigest,
        $kver,
        $effectiveTs,
        $expTs,
        $ktype,
        $kusage,
        $kstatus
    ) {
        if (empty($kid) || empty($service)) {
            throw new \InvalidArgumentException("ID and App fields cannot be null.");
        }

        $this->service = $service;
        $this->id = $kid;
        $this->key = $key;

        if ($kver < -1) {
            throw new \InvalidArgumentException("Invalid key version.");
        }
        $this->ver = $kver;

        $this->keyUsage = 2; // 默认值 ED
        if (is_string($kusage)) {
            switch ($kusage) {
                case 'N': $this->keyUsage = -1; break;
                case 'E': $this->keyUsage = 0; break;
                case 'D': $this->keyUsage = 1; break;
                case 'ED': $this->keyUsage = 2; break;
                default: $this->keyUsage = 2; break;
            }
        } elseif (is_int($kusage)) {
            $this->keyUsage = $kusage;
        }

        $this->keyStatus = is_int($kstatus) ? $kstatus : 0;
        $this->keyType = is_int($ktype) ? $ktype : 0;

        $this->isValid = false;
        if (!empty($key)) {
            $this->key = $key;
            $this->expired = $expTs;
            $this->effective = $effectiveTs;
            $this->skey = substr($this->key, 0, 16);
            $this->svkey = $this->key;
        }

        $this->key_digest = $kdigest;
        $digest = base64_encode(hash(Constants::DEFAULT_CERTDIGEST_ALGO, $this->key, true));

        if (strcmp($this->key_digest, $digest) == 0) {
            $this->isValid = true;
        }
    }

    /**
     * 加密数据（弱加密）
     * @param string $pt 明文
     * @return string 密文
     */
    public function encrypt($pt)
    {
        $ct = KeyEncryption::encrypt($this, $pt);
        $ct = pack("C", Constants::CIPHER_TYPE_WEAK) . pack("C", Constants::ALGO_TYPE_AES_CBC_128) . $this->id . $ct;

        return $ct;
    }

    /**
     * 加密数据（强加密）
     * @param string $pt 明文
     * @return string 密文
     */
    public function strong_encrypt($pt)
    {
        $de = new DataEncryption();
        $data_cipher = $de->encrypt($pt);
        $key_cipher = KeyEncryption::wrap($this, $de->exportKey());

        $ct = pack("C", Constants::CIPHER_TYPE_REGULAR) . pack("n", strlen($this->id)) .
            $this->id . pack("C", Constants::ALGO_TYPE_AES_CBC_128) . pack("n", strlen($key_cipher)) .
            $key_cipher . pack("C", Constants::ALGO_TYPE_AES_CBC_128) . pack("N", strlen($data_cipher)) . $data_cipher;

        return $ct;
    }

    /**
     * 解密数据（强加密）
     * @param string $ct 密文
     * @return string 明文
     * @throws \InvalidArgumentException
     */
    public function strong_decrypt($ct)
    {
        $offset = 0;
        $ctype_ = unpack("C", $ct[$offset]);
        $ctype = $ctype_[1];
        $offset += 1;
        if ($ctype != Constants::CIPHER_TYPE_REGULAR) {
            throw new \InvalidArgumentException("Unmatched CipherText Type.");
        }
        $eidLen_ = unpack("n", substr($ct, $offset, 2));
        $eidLen = $eidLen_[1];
        $offset += 2;
        if ($eidLen !== Constants::DEFAULT_KEYID_LEN) {
            throw new \InvalidArgumentException("Corrupted ciphertext header with illegal key id length.");
        }

        $eid = substr($ct, $offset, $eidLen);
        $offset += $eidLen;
        if ($this->id != $eid) {
            throw new \InvalidArgumentException("Unmatched MKey ID.");
        }
        $atype_ = unpack("C", substr($ct, $offset, 1));
        $atype = $atype_[1];
        $offset += 1;
        if ($atype != Constants::ALGO_TYPE_AES_CBC_128) {
            throw new \InvalidArgumentException("Unmatched Key Encryption Algorithm Type:$atype");
        }
        $kcipherLen_ = unpack("n", substr($ct, $offset, 2));
        $kcipherLen = $kcipherLen_[1];
        $offset += 2;
        if ($kcipherLen < Constants::DEFAULT_CIPHERBLK_LEN || $kcipherLen > strlen(substr($ct, $offset))) {
            throw new \InvalidArgumentException("Corrupted ciphertext header with illegal key cipher length.");
        }

        $kcipher = substr($ct, $offset, $kcipherLen);
        $offset += $kcipherLen;
        $dkey = KeyEncryption::unwrap($this, $kcipher);
        $dtype_ = unpack("C", substr($ct, $offset, 1));
        $dtype = $dtype_[1];
        $offset += 1;
        if ($dtype != Constants::ALGO_TYPE_AES_CBC_128) {
            throw new \InvalidArgumentException("Unmatched Data Encryption Algorithm Type:$dtype");
        }
        $dcipherLen_ = unpack("N", substr($ct, $offset, 4));
        $dcipherLen = $dcipherLen_[1];
        $offset += 4;

        if ($dcipherLen != strlen(substr($ct, $offset))) {
            throw new \InvalidArgumentException("Corrupted ciphertext header with illegal data cipher length.");
        }

        $dcipher = substr($ct, $offset);

        $de = new DataEncryption($dkey);
        $pt = $de->decrypt($dcipher);

        return $pt;
    }

    /**
     * 解密数据（弱加密）
     * @param string $ct 密文
     * @return string 明文
     * @throws \InvalidArgumentException
     */
    public function decrypt($ct)
    {
        $offset = 0;

        // Get and validate cipher type
        $ctype_ = unpack("C", substr($ct, $offset, Constants::CIPHER_TYPE_LEN));
        $ctype = $ctype_[1];
        $offset += Constants::CIPHER_TYPE_LEN;
        if ($ctype != Constants::CIPHER_TYPE_WEAK) {
            throw new \InvalidArgumentException("Unmatch Encryption Algorithm Type: $ctype");
        }

        // Get and validate algo type
        $atype_ = unpack("C", substr($ct, $offset, Constants::ALGO_TYPE_LEN));
        $atype = $atype_[1];
        $offset += Constants::ALGO_TYPE_LEN;
        if ($atype != Constants::ALGO_TYPE_AES_CBC_128) {
            throw new \InvalidArgumentException("Unmatch Encryption Algorithm Type: $atype");
        }

        $eid = substr($ct, $offset, Constants::DEFAULT_KEYID_LEN);
        $offset += Constants::DEFAULT_KEYID_LEN;
        if ($eid != $this->id) {
            throw new \InvalidArgumentException("Unmatch MKey ID.");
        }

        $ct_data = substr($ct, $offset);

        $pt = KeyEncryption::decrypt($this, $ct_data);

        return $pt;
    }

    /**
     * 签名数据
     * @param string $input 输入数据
     * @return string 签名结果（base64编码）
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function sign($input)
    {
        if ($input === null) {
            throw new \InvalidArgumentException("Illegal input.");
        }

        if ($this->id == null || strlen($this->id) != Constants::DEFAULT_KEYID_LEN) {
            throw new \InvalidArgumentException("Illegal Signing Key.");
        }

        $rsec = Crypto::secureRandom(Constants::DEFAULT_SEED_LEN);
        $data = $input . $rsec;
        $signedData = hash_hmac(Constants::DEFAULT_TOKEN_SIGN_ALGO, $data, $this->svkey, true);

        if ($signedData === false) {
            throw new \RuntimeException("Sign fail, algo:" . Constants::DEFAULT_TOKEN_SIGN_ALGO);
        }

        $ret = $this->id . $rsec . $signedData;

        return base64_encode($ret);
    }

    /**
     * 验证签名
     * @param string $input 输入数据
     * @param string $sig 签名
     * @return bool 验证结果
     * @throws \InvalidArgumentException
     */
    public function verify($input, $sig)
    {
        if ($input === null) {
            throw new \InvalidArgumentException("Illegal input.");
        }

        if ($sig === null || strlen($sig) < Constants::DEFAULT_KEYID_LEN + Constants::DEFAULT_SEED_LEN) {
            throw new \InvalidArgumentException("Illegal Signature.");
        }
        // skip key id
        $offset = Constants::DEFAULT_KEYID_LEN;

        $sig = base64_decode($sig);

        $rsec = substr($sig, $offset, Constants::DEFAULT_SEED_LEN);
        $offset += Constants::DEFAULT_SEED_LEN;

        $carriedSig = substr($sig, $offset);

        $data = $input . $rsec;

        $signedData = hash_hmac(Constants::DEFAULT_TOKEN_SIGN_ALGO, $data, $this->svkey, true);

        return $carriedSig == $signedData;
    }

    /**
     * 获取密钥
     * @return string
     */
    public function getKey()
    {
        return $this->skey;
    }

    /**
     * 获取原始密钥
     * @return string
     */
    public function getRawKey()
    {
        return $this->key;
    }

    /**
     * 是否有效
     * @return bool
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * 获取ID
     * @return string
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * 获取生效时间
     * @return mixed
     */
    public function getEffectiveTime()
    {
        return $this->effective;
    }

    /**
     * 获取密钥状态
     * @return int
     */
    public function getKeyStatus()
    {
        return $this->keyStatus;
    }

    /**
     * 获取版本
     * @return int
     */
    public function getVersion()
    {
        return $this->ver;
    }

    /**
     * 获取密钥用途
     * @return int
     */
    public function getKeyUsage()
    {
        return $this->keyUsage;
    }

    /**
     * 获取过期时间
     * @return mixed
     */
    public function getExpiredTime()
    {
        return $this->expired;
    }
}
