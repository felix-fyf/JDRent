<?php

namespace JDRent\Request;

class RentPayApplyRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $merchantNo;
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
    private $outApplyNo;
    /**
    * type: String
    */
    private $outOrderNo;
    /**
    * type: String
    */
    private $reqPlatType;
    /**
    * type: String
    */
    private $applyTime;
    /**
    * type: Integer
    */
    private $expireTime;
    /**
    * type: String
    */
    private $tradeSubject;
    /**
    * type: String
    */
    private $tradeRemark;
    /**
    * type: String
    */
    private $returnParams;
    /**
    * type: BigDecimal
    */
    private $payAmt;
    /**
    * type: String
    */
    private $successBackUrl;
    /**
    * type: List
    */
    private $feeDetailList;

    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getMerchantNo() {
        return $this->merchantNo;
    }

    public function setMerchantNo($merchantNo) {
        $this->merchantNo = $merchantNo;
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
    public function getOutApplyNo() {
        return $this->outApplyNo;
    }

    public function setOutApplyNo($outApplyNo) {
        $this->outApplyNo = $outApplyNo;
    }
    public function getOutOrderNo() {
        return $this->outOrderNo;
    }

    public function setOutOrderNo($outOrderNo) {
        $this->outOrderNo = $outOrderNo;
    }
    public function getReqPlatType() {
        return $this->reqPlatType;
    }

    public function setReqPlatType($reqPlatType) {
        $this->reqPlatType = $reqPlatType;
    }
    public function getApplyTime() {
        return $this->applyTime;
    }

    public function setApplyTime($applyTime) {
        $this->applyTime = $applyTime;
    }
    public function getExpireTime() {
        return $this->expireTime;
    }

    public function setExpireTime($expireTime) {
        $this->expireTime = $expireTime;
    }
    public function getTradeSubject() {
        return $this->tradeSubject;
    }

    public function setTradeSubject($tradeSubject) {
        $this->tradeSubject = $tradeSubject;
    }
    public function getTradeRemark() {
        return $this->tradeRemark;
    }

    public function setTradeRemark($tradeRemark) {
        $this->tradeRemark = $tradeRemark;
    }
    public function getReturnParams() {
        return $this->returnParams;
    }

    public function setReturnParams($returnParams) {
        $this->returnParams = $returnParams;
    }
    public function getPayAmt() {
        return $this->payAmt;
    }

    public function setPayAmt($payAmt) {
        $this->payAmt = $payAmt;
    }
    public function getSuccessBackUrl() {
        return $this->successBackUrl;
    }

    public function setSuccessBackUrl($successBackUrl) {
        $this->successBackUrl = $successBackUrl;
    }
    public function getFeeDetailList() {
        return $this->feeDetailList;
    }

    public function setFeeDetailList($feeDetailList) {
        $this->feeDetailList = $feeDetailList;
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

class RentPayApplyFeeDetail implements \JsonSerializable
{
    /**
    * type: String
    */
    private $feeType;
    /**
    * type: String
    */
    private $outFeeNo;
    /**
    * type: Integer
    */
    private $period;
    /**
    * type: BigDecimal
    */
    private $feeTotalAmt;
    /**
    * type: List
    */
    private $divisionAccountDetailList;

    public function getFeeType() {
    return $this->feeType;
    }

    public function setFeeType($feeType) {
    $this->feeType = $feeType;
    }
    public function getOutFeeNo() {
    return $this->outFeeNo;
    }

    public function setOutFeeNo($outFeeNo) {
    $this->outFeeNo = $outFeeNo;
    }
    public function getPeriod() {
    return $this->period;
    }

    public function setPeriod($period) {
    $this->period = $period;
    }
    public function getFeeTotalAmt() {
    return $this->feeTotalAmt;
    }

    public function setFeeTotalAmt($feeTotalAmt) {
    $this->feeTotalAmt = $feeTotalAmt;
    }
    public function getDivisionAccountDetailList() {
    return $this->divisionAccountDetailList;
    }

    public function setDivisionAccountDetailList($divisionAccountDetailList) {
    $this->divisionAccountDetailList = $divisionAccountDetailList;
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
class RentPayApplyDivisionAccountDetail implements \JsonSerializable
{
    /**
    * type: String
    */
    private $merchantNo;
    /**
    * type: String
    */
    private $merchantName;
    /**
    * type: String
    */
    private $divisionAccountAmt;

    public function getMerchantNo() {
    return $this->merchantNo;
    }

    public function setMerchantNo($merchantNo) {
    $this->merchantNo = $merchantNo;
    }
    public function getMerchantName() {
    return $this->merchantName;
    }

    public function setMerchantName($merchantName) {
    $this->merchantName = $merchantName;
    }
    public function getDivisionAccountAmt() {
    return $this->divisionAccountAmt;
    }

    public function setDivisionAccountAmt($divisionAccountAmt) {
    $this->divisionAccountAmt = $divisionAccountAmt;
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
