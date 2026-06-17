<?php

namespace JDRent\Support\Security;

use JDRent\Support\Constant\EncryptTypeEnum;

class DeviceCryptoService
{
    /**
     * 信封加密
     * @param $data
     * @param $encryCert
     * @return mixed
     */
    public static function encrypt_envelop($data, $encryCert)
    {
        $encryCert = "-----BEGIN CERTIFICATE-----\n" . $encryCert . "\n-----END CERTIFICATE-----";

        $envelopeBase64 = self::encrypt($data, $encryCert);

        $envelopeBase64 = trim(substr($envelopeBase64, strpos($envelopeBase64, "base64") + strlen("base64")));

        return $envelopeBase64;
    }

    /**
     * @param $data
     * @param $signature
     * @param $verifyCert
     * @return bool
     */
    public static function p1_verify($data, $signature, $verifyCert)
    {
        $publicKey = self::getCertPublicKey($verifyCert);
        $res = openssl_verify($data, $signature, $publicKey, OPENSSL_ALGO_SHA256);
        return $res === 1;
    }

    private static function getCertPublicKey($mer_public_key)
    {
        $publicKey = chunk_split($mer_public_key, 64, "\n");
        $publicKey = "-----BEGIN CERTIFICATE-----\n$publicKey-----END CERTIFICATE-----\n";
        return $publicKey;
    }

    private static function encrypt($data, $encryCert)
    {
        $dataFileName = self::createRandFileName("tmp");
        $outFileName = self::createRandFileName("tmp");
        $datafile = fopen($dataFileName, "w");
        fwrite($datafile, $data);
        fclose($datafile);
        self::pkcs7_encrypt($dataFileName, $outFileName, $encryCert);
        $outFileContent = file_get_contents($outFileName);
        unlink($dataFileName);
        unlink($outFileName);
        return $outFileContent;
    }

    private static function createRandFileName($suffix)
    {
        return md5(uniqid(microtime(true), true)) . "." . $suffix;
    }

    private static function pkcs7_encrypt($infile, $outfile, $cert)
    {
        openssl_pkcs7_encrypt($infile, $outfile, $cert, null, PKCS7_BINARY, OPENSSL_CIPHER_3DES);
    }
}
