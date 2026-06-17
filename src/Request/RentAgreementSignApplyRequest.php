<?php

namespace JDRent\Request;

class RentAgreementSignApplyRequest implements \JsonSerializable
{
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
    private $openId;
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $xid;

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
    public function getOpenId() {
        return $this->openId;
    }

    public function setOpenId($openId) {
        $this->openId = $openId;
    }
    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getXid() {
        return $this->xid;
    }

    public function setXid($xid) {
        $this->xid = $xid;
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

class RentAgreementSignApplyDeviceInfo implements \JsonSerializable
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
