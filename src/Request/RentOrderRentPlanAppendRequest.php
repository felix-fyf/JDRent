<?php

namespace JDRent\Request;

class RentOrderRentPlanAppendRequest implements \JsonSerializable
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
    private $orderRentEndDate;
    /**
    * type: List
    */
    private $appendRentPlanList;

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
    public function getOrderRentEndDate() {
        return $this->orderRentEndDate;
    }

    public function setOrderRentEndDate($orderRentEndDate) {
        $this->orderRentEndDate = $orderRentEndDate;
    }
    public function getAppendRentPlanList() {
        return $this->appendRentPlanList;
    }

    public function setAppendRentPlanList($appendRentPlanList) {
        $this->appendRentPlanList = $appendRentPlanList;
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

class RentOrderRentPlanAppendItem implements \JsonSerializable
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
class RentOrderRentPlanAppendItem1 implements \JsonSerializable
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
