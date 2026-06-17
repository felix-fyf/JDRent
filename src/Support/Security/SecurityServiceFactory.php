<?php

namespace JDRent\Support\Security;

use JDRent\Support\Constant\KeyTypeEnum;

class SecurityServiceFactory
{
    public static function getSecurityService($keyType)
    {
        if ($keyType == KeyTypeEnum::SECRET_KEY_PLATFORM) {
            return new SecretKeyPlatformSecurity();
        } else if ($keyType == KeyTypeEnum::AKS_KEY_PLATFORM) {
            return new AksPlatformSecurity();
        }
        return new AksPlatformSecurity();
    }
}
