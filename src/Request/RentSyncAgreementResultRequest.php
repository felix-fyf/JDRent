<?php

namespace JDRent\Request;

class RentSyncAgreementResultRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $lockKey;
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $partnerNo;
    /**
    * type: String
    */
    private $partnerName;
    /**
    * type: String
    */
    private $appkey;
    /**
    * type: String
    */
    private $jdpin;
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
    private $templateNo;
    /**
    * type: String
    */
    private $agreementDesc;
    /**
    * type: String
    */
    private $agreementNo;
    /**
    * type: String
    */
    private $inCustomerNo;
    /**
    * type: String
    */
    private $inMerchantNo;
    /**
    * type: String
    */
    private $agreementType;
    /**
    * type: String
    */
    private $outReqNo;

    public function getLockKey() {
        return $this->lockKey;
    }

    public function setLockKey($lockKey) {
        $this->lockKey = $lockKey;
    }
    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getPartnerNo() {
        return $this->partnerNo;
    }

    public function setPartnerNo($partnerNo) {
        $this->partnerNo = $partnerNo;
    }
    public function getPartnerName() {
        return $this->partnerName;
    }

    public function setPartnerName($partnerName) {
        $this->partnerName = $partnerName;
    }
    public function getAppkey() {
        return $this->appkey;
    }

    public function setAppkey($appkey) {
        $this->appkey = $appkey;
    }
    public function getJdpin() {
        return $this->jdpin;
    }

    public function setJdpin($jdpin) {
        $this->jdpin = $jdpin;
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
    public function getTemplateNo() {
        return $this->templateNo;
    }

    public function setTemplateNo($templateNo) {
        $this->templateNo = $templateNo;
    }
    public function getAgreementDesc() {
        return $this->agreementDesc;
    }

    public function setAgreementDesc($agreementDesc) {
        $this->agreementDesc = $agreementDesc;
    }
    public function getAgreementNo() {
        return $this->agreementNo;
    }

    public function setAgreementNo($agreementNo) {
        $this->agreementNo = $agreementNo;
    }
    public function getInCustomerNo() {
        return $this->inCustomerNo;
    }

    public function setInCustomerNo($inCustomerNo) {
        $this->inCustomerNo = $inCustomerNo;
    }
    public function getInMerchantNo() {
        return $this->inMerchantNo;
    }

    public function setInMerchantNo($inMerchantNo) {
        $this->inMerchantNo = $inMerchantNo;
    }
    public function getAgreementType() {
        return $this->agreementType;
    }

    public function setAgreementType($agreementType) {
        $this->agreementType = $agreementType;
    }
    public function getOutReqNo() {
        return $this->outReqNo;
    }

    public function setOutReqNo($outReqNo) {
        $this->outReqNo = $outReqNo;
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

