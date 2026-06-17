<?php

namespace JDRent\Request;

class RentSpUnifiedAgreementApplyRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $openId;
    /**
    * type: String
    */
    private $xid;
    /**
    * type: String
    */
    private $outOrderNo;
    /**
    * type: String
    */
    private $returnUrl;
    /**
    * type: DeviceInfo
    */
    private $deviceInfo;
    /**
    * type: String
    */
    private $merchantNo;
    /**
    * type: String
    */
    private $templateNo;
    /**
    * type: String
    */
    private $customerNo;

    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getOpenId() {
        return $this->openId;
    }

    public function setOpenId($openId) {
        $this->openId = $openId;
    }
    public function getXid() {
        return $this->xid;
    }

    public function setXid($xid) {
        $this->xid = $xid;
    }
    public function getOutOrderNo() {
        return $this->outOrderNo;
    }

    public function setOutOrderNo($outOrderNo) {
        $this->outOrderNo = $outOrderNo;
    }
    public function getReturnUrl() {
        return $this->returnUrl;
    }

    public function setReturnUrl($returnUrl) {
        $this->returnUrl = $returnUrl;
    }
    public function getDeviceInfo() {
        return $this->deviceInfo;
    }

    public function setDeviceInfo($deviceInfo) {
        $this->deviceInfo = $deviceInfo;
    }
    public function getMerchantNo() {
        return $this->merchantNo;
    }

    public function setMerchantNo($merchantNo) {
        $this->merchantNo = $merchantNo;
    }
    public function getTemplateNo() {
        return $this->templateNo;
    }

    public function setTemplateNo($templateNo) {
        $this->templateNo = $templateNo;
    }
    public function getCustomerNo() {
        return $this->customerNo;
    }

    public function setCustomerNo($customerNo) {
        $this->customerNo = $customerNo;
    }

    public function jsonSerialize()
    {
        $data = [];
        foreach ($this as $key => $val) {
            if ($val !== null) {
                $data[$key] = $val;
            }
        }
        return $data;
    }
}

class RentSpUnifiedAgreementApplyDeviceInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $appType;
    /**
    * type: String
    */
    private $ip;
    /**
    * type: String
    */
    private $os;

    public function getAppType() {
    return $this->appType;
    }

    public function setAppType($appType) {
    $this->appType = $appType;
    }
    public function getIp() {
    return $this->ip;
    }

    public function setIp($ip) {
    $this->ip = $ip;
    }
    public function getOs() {
    return $this->os;
    }

    public function setOs($os) {
    $this->os = $os;
    }

    public function jsonSerialize()
    {
        $data = [];
        foreach ($this as $key => $val) {
            if ($val !== null) {
                $data[$key] = $val;
            }
        }
        return $data;
    }
}
