<?php

namespace JDRent\Request;

class RentSyncRefundResultRequest implements \JsonSerializable
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
    private $refundApplyNo;
    /**
    * type: String
    */
    private $originPayApplyNo;
    /**
    * type: BigDecimal
    */
    private $refundAmt;
    /**
    * type: String
    */
    private $refundFinishTime;
    /**
    * type: String
    */
    private $refundTradeNo;
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
    public function getRefundApplyNo() {
        return $this->refundApplyNo;
    }

    public function setRefundApplyNo($refundApplyNo) {
        $this->refundApplyNo = $refundApplyNo;
    }
    public function getOriginPayApplyNo() {
        return $this->originPayApplyNo;
    }

    public function setOriginPayApplyNo($originPayApplyNo) {
        $this->originPayApplyNo = $originPayApplyNo;
    }
    public function getRefundAmt() {
        return $this->refundAmt;
    }

    public function setRefundAmt($refundAmt) {
        $this->refundAmt = $refundAmt;
    }
    public function getRefundFinishTime() {
        return $this->refundFinishTime;
    }

    public function setRefundFinishTime($refundFinishTime) {
        $this->refundFinishTime = $refundFinishTime;
    }
    public function getRefundTradeNo() {
        return $this->refundTradeNo;
    }

    public function setRefundTradeNo($refundTradeNo) {
        $this->refundTradeNo = $refundTradeNo;
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

class RentSyncRefundResultItem implements \JsonSerializable
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
class RentSyncRefundResultItem1 implements \JsonSerializable
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
    private $divisionAccountAmt;
    /**
    * type: String
    */
    private $divisionAccountTradeNo;

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
    public function getDivisionAccountTradeNo() {
    return $this->divisionAccountTradeNo;
    }

    public function setDivisionAccountTradeNo($divisionAccountTradeNo) {
    $this->divisionAccountTradeNo = $divisionAccountTradeNo;
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
