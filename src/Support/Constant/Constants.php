<?php

namespace JDRent\Support\Constant;

class Constants
{
    const RSA = 'RSA';
    /**签名串拼接字符*/
    const SIGNSTR_FIRST_SPLICE = '=';
    /**签名串拼接字符*/
    const SIGNSTR_SECOND_SPLICE = '&';
    /**签名串参数前缀*/
    const SIGNSTR_FIXED_PRE = 'jrgw';

    const JRGW_NOTIFY_NO = 'jrgw-notify-no';
    const JRGW_REQUEST_TIME = 'jrgw-request-time';
    const BIZ_CONTENT = 'biz-content';
    const ENCRYPT = 'encrypt';
    const GW_SIGN = 'gw-sign';
    const VERSION_SDK = '1.0.1';
    /**普通密文模式*/
    const GW_ENCRYPT_TYPE_RSA = 'RSA';
    /**信封模式*/
    const GW_ENCRYPT_TYPE_ENV_RSA = 'ENV_RSA';
    const JRGW_ENV_KEY = "jrgw-env-key";
    const JRGW_ENTERPRISE_USER_ID = 'jrgw-enterprise-user-id';
    const JRGW_USER_ID_TYPE = 'jrgw-user-id-type';
    const GW_ENCRYPT_TYPE = 'gw-encrypt-type';
    const JRGW_RESPOND_TIME = "jrgw-respond-time";
    const JRGW_RESP_CODE = "jrgw-resp-code";
    const JRGW_RESP_MSG = "jrgw-resp-msg";
    const JRGW_RESP_ENV_KEY = "jrgw-resp-env-key";
    const EQUAL_FLAG = "=";
}
