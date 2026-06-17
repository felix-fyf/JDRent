<?php

namespace JDRent\Request;

class RentRentPayPlanSyncRequest implements \JsonSerializable
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
    private $orderStatus;
    /**
    * type: String
    */
    private $orderType;
    /**
    * type: List
    */
    private $rentPlanList;

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
    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }
    public function getOrderType() {
        return $this->orderType;
    }

    public function setOrderType($orderType) {
        $this->orderType = $orderType;
    }
    public function getRentPlanList() {
        return $this->rentPlanList;
    }

    public function setRentPlanList($rentPlanList) {
        $this->rentPlanList = $rentPlanList;
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

class RentRentPayPlanSyncItem implements \JsonSerializable
{
    /**
    * type: String
    */
    private $outPlanNo;
    /**
    * type: Integer
    */
    private $period;
    /**
    * type: Integer
    */
    private $status;
    /**
    * type: String
    */
    private $feeType;
    /**
    * type: String
    */
    private $planRepayDate;
    /**
    * type: BigDecimal
    */
    private $planRepayAmt;
    /**
    * type: String
    */
    private $actualRepayDate;
    /**
    * type: BigDecimal
    */
    private $actualRepayAmt;
    /**
    * type: BigDecimal
    */
    private $reduceAmt;
    /**
    * type: List
    */
    private $divisionInfoList;

    public function getOutPlanNo() {
    return $this->outPlanNo;
    }

    public function setOutPlanNo($outPlanNo) {
    $this->outPlanNo = $outPlanNo;
    }
    public function getPeriod() {
    return $this->period;
    }

    public function setPeriod($period) {
    $this->period = $period;
    }
    public function getStatus() {
    return $this->status;
    }

    public function setStatus($status) {
    $this->status = $status;
    }
    public function getFeeType() {
    return $this->feeType;
    }

    public function setFeeType($feeType) {
    $this->feeType = $feeType;
    }
    public function getPlanRepayDate() {
    return $this->planRepayDate;
    }

    public function setPlanRepayDate($planRepayDate) {
    $this->planRepayDate = $planRepayDate;
    }
    public function getPlanRepayAmt() {
    return $this->planRepayAmt;
    }

    public function setPlanRepayAmt($planRepayAmt) {
    $this->planRepayAmt = $planRepayAmt;
    }
    public function getActualRepayDate() {
    return $this->actualRepayDate;
    }

    public function setActualRepayDate($actualRepayDate) {
    $this->actualRepayDate = $actualRepayDate;
    }
    public function getActualRepayAmt() {
    return $this->actualRepayAmt;
    }

    public function setActualRepayAmt($actualRepayAmt) {
    $this->actualRepayAmt = $actualRepayAmt;
    }
    public function getReduceAmt() {
    return $this->reduceAmt;
    }

    public function setReduceAmt($reduceAmt) {
    $this->reduceAmt = $reduceAmt;
    }
    public function getDivisionInfoList() {
    return $this->divisionInfoList;
    }

    public function setDivisionInfoList($divisionInfoList) {
    $this->divisionInfoList = $divisionInfoList;
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
class RentRentPayPlanSyncItem1 implements \JsonSerializable
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
    * type: BigDecimal
    */
    private $amount;

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
    public function getAmount() {
    return $this->amount;
    }

    public function setAmount($amount) {
    $this->amount = $amount;
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
