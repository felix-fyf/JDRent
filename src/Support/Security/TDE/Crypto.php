<?php

namespace JDRent\Support\Security\TDE;

final class Crypto
{
    const CIPHER_METHOD_AES_128_CBC = 'aes-128-cbc';
    const CIPHER_BLOCK_SIZE = 16;
    const CIPHER_IV_SIZE = 16;
    const CIPHER_KEY_SIZE = 16;

    /**
     * Returns a random byte string of the specified length.
     *
     * @param int $octets
     * @return string
     * @throws \RuntimeException
     */
    public static function secureRandom($octets)
    {
        try {
            return \openssl_random_pseudo_bytes($octets);
        } catch (\Exception $ex) {
            throw new \RuntimeException('Your system does not have a secure random number generator.');
        }
    }
}
