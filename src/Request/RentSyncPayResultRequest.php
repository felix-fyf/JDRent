<?php

namespace JDRent\Request;

class RentSyncPayResultRequest implements \JsonSerializable
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
    private $inMerchantNo;
    /**
    * type: String
    */
    private $inCustomerNo;
    /**
    * type: String
    */
    private $repayNo;
    /**
    * type: String
    */
    private $realTradeNo;
    /**
    * type: Date
    */
    private $repayTime;
    /**
    * type: BigDecimal
    */
    private $repayAmt;
    /**
    * type: String
    */
    private $repayType;
    /**
    * type: String
    */
    private $remark;
    /**
    * type: List
    */
    private $feeDetailList;
    /**
    * type: String
    */
    private $payChannel;

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
    public function getInMerchantNo() {
        return $this->inMerchantNo;
    }

    public function setInMerchantNo($inMerchantNo) {
        $this->inMerchantNo = $inMerchantNo;
    }
    public function getInCustomerNo() {
        return $this->inCustomerNo;
    }

    public function setInCustomerNo($inCustomerNo) {
        $this->inCustomerNo = $inCustomerNo;
    }
    public function getRepayNo() {
        return $this->repayNo;
    }

    public function setRepayNo($repayNo) {
        $this->repayNo = $repayNo;
    }
    public function getRealTradeNo() {
        return $this->realTradeNo;
    }

    public function setRealTradeNo($realTradeNo) {
        $this->realTradeNo = $realTradeNo;
    }
    public function getRepayTime() {
        return $this->repayTime;
    }

    public function setRepayTime($repayTime) {
        $this->repayTime = $repayTime;
    }
    public function getRepayAmt() {
        return $this->repayAmt;
    }

    public function setRepayAmt($repayAmt) {
        $this->repayAmt = $repayAmt;
    }
    public function getRepayType() {
        return $this->repayType;
    }

    public function setRepayType($repayType) {
        $this->repayType = $repayType;
    }
    public function getRemark() {
        return $this->remark;
    }

    public function setRemark($remark) {
        $this->remark = $remark;
    }
    public function getFeeDetailList() {
        return $this->feeDetailList;
    }

    public function setFeeDetailList($feeDetailList) {
        $this->feeDetailList = $feeDetailList;
    }
    public function getPayChannel() {
        return $this->payChannel;
    }

    public function setPayChannel($payChannel) {
        $this->payChannel = $payChannel;
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

class RentSyncPayResultItem implements \JsonSerializable
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
class RentSyncPayResultItem1 implements \JsonSerializable
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
