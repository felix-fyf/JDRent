<?php

namespace JDRent\Request;

class RentApplyAuthRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $xid;
    /**
    * type: String
    */
    private $authNo;
    /**
    * type: String
    */
    private $outOrderNo;
    /**
    * type: String
    */
    private $openId;
    /**
    * type: String
    */
    private $customerName;
    /**
    * type: String
    */
    private $customerCertType;
    /**
    * type: String
    */
    private $customerCertId;
    /**
    * type: String
    */
    private $deviceInfo;

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
    public function getAuthNo() {
        return $this->authNo;
    }

    public function setAuthNo($authNo) {
        $this->authNo = $authNo;
    }
    public function getOutOrderNo() {
        return $this->outOrderNo;
    }

    public function setOutOrderNo($outOrderNo) {
        $this->outOrderNo = $outOrderNo;
    }
    public function getOpenId() {
        return $this->openId;
    }

    public function setOpenId($openId) {
        $this->openId = $openId;
    }
    public function getCustomerName() {
        return $this->customerName;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }
    public function getCustomerCertType() {
        return $this->customerCertType;
    }

    public function setCustomerCertType($customerCertType) {
        $this->customerCertType = $customerCertType;
    }
    public function getCustomerCertId() {
        return $this->customerCertId;
    }

    public function setCustomerCertId($customerCertId) {
        $this->customerCertId = $customerCertId;
    }
    public function getDeviceInfo() {
        return $this->deviceInfo;
    }

    public function setDeviceInfo($deviceInfo) {
        $this->deviceInfo = $deviceInfo;
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

