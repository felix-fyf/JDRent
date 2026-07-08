<?php

namespace JDRent\Support\Security\TDE;

abstract class Constants
{
    const CIPHER_TYPE_WEAK      = 0;
    const CIPHER_TYPE_REGULAR   = 1;
    const CIPHER_TYPE_LARGE     = 2;
    const CIPHER_TYPE_LEN       = 1;

    const ALGO_TYPE_AES_CBC_128 = 4;
    const ALGO_TYPE_LEN         = 1;

    const DEFAULT_KEYID_LEN = 16;
    const DEFAULT_DKEY_LEN = 16;
    const DEFAULT_CIPHERBLK_LEN = 16;
    const DEFAULT_SEED_LEN = 16;

    const CIPHER_METHOD_AES_128_CBC = 'aes-128-cbc';
    const CIPHER_BLOCK_SIZE = 16;
    const CIPHER_IV_SIZE = 16;
    const CIPHER_KEY_SIZE = 16;

    const DEFAULT_TOKEN_SIGN_ALGO = "sha256";
    const DEFAULT_CERTDIGEST_ALGO = "sha256";

    // weak version header: CipherType(1b) Algorithm(1b) | MKeyID(16b)
    const WEAK_HDR_LEN = 18;
    // strong version header
    const STRONG_HDR_LEN = 43;
}

abstract class KEY_STATUS
{
    const ACTIVE = 0;
    const SUSPENDED = 1;
    const REVOKED = 2;

    public static function fromValue($value)
    {
        if ($value === null) {
            throw new \InvalidArgumentException("Key status is null.");
        }

        switch ($value) {
            case 0: return KEY_STATUS::ACTIVE;
            case 1: return KEY_STATUS::SUSPENDED;
            case 2: return KEY_STATUS::REVOKED;
            default: throw new \InvalidArgumentException("Unknown key status.");
        }
    }
}

abstract class KEY_USAGE
{
    const N = -1;
    const E = 0;
    const D = 1;
    const ED = 2;

    public static function fromValue($value)
    {
        if ($value === null) {
            throw new \InvalidArgumentException("Key usage is null.");
        }

        switch ($value) {
            case "N": return KEY_USAGE::N;
            case "E": return KEY_USAGE::E;
            case "D": return KEY_USAGE::D;
            case "ED": return KEY_USAGE::ED;
            default: throw new \InvalidArgumentException("Unknown key usage.");
        }
    }
}

abstract class KEY_TYPE
{
    const AES = 0;

    public static function fromValue($value)
    {
        if ($value === null) {
            throw new \InvalidArgumentException("Key type is null.");
        }
        switch ($value) {
            case 0: return KEY_TYPE::AES;
            default: throw new \InvalidArgumentException("Unknown key type.");
        }
    }
}

abstract class CipherType
{
    const WEAK = 0;
    const REGULAR = 1;
    const LARGE = 2;

    public static function fromValue($code)
    {
        switch ($code) {
            case 0: return CipherType::WEAK;
            case 1: return CipherType::REGULAR;
            case 2: return CipherType::LARGE;
            default: throw new \InvalidArgumentException("Unknown cipher type.");
        }
    }
}

abstract class ResultType
{
    const Decryptable = 0;
    const Malformed = 1;
    const Feasible = 2;
    const UnDecryptable = 3;
}

class CipherResult
{
    public $keyid;
    public $status;
    public $isStrong;

    public function __construct($resultType, $keyID, $isStrong)
    {
        $this->keyid = $keyID;
        $this->status = $resultType;
        $this->isStrong = $isStrong;
    }
}
