<?php

namespace JDRent\Request;

class RentRefundApplyRequest implements \JsonSerializable
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
    private $outApplyNo;
    /**
    * type: String
    */
    private $refundType;
    /**
    * type: String
    */
    private $originOutApplyNo;
    /**
    * type: String
    */
    private $outOrderNo;
    /**
    * type: BigDecimal
    */
    private $refundAmt;
    /**
    * type: List
    */
    private $feeDetailList;
    /**
    * type: String
    */
    private $reductionFlag;

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
    public function getOutApplyNo() {
        return $this->outApplyNo;
    }

    public function setOutApplyNo($outApplyNo) {
        $this->outApplyNo = $outApplyNo;
    }
    public function getRefundType() {
        return $this->refundType;
    }

    public function setRefundType($refundType) {
        $this->refundType = $refundType;
    }
    public function getOriginOutApplyNo() {
        return $this->originOutApplyNo;
    }

    public function setOriginOutApplyNo($originOutApplyNo) {
        $this->originOutApplyNo = $originOutApplyNo;
    }
    public function getOutOrderNo() {
        return $this->outOrderNo;
    }

    public function setOutOrderNo($outOrderNo) {
        $this->outOrderNo = $outOrderNo;
    }
    public function getRefundAmt() {
        return $this->refundAmt;
    }

    public function setRefundAmt($refundAmt) {
        $this->refundAmt = $refundAmt;
    }
    public function getFeeDetailList() {
        return $this->feeDetailList;
    }

    public function setFeeDetailList($feeDetailList) {
        $this->feeDetailList = $feeDetailList;
    }
    public function getReductionFlag() {
        return $this->reductionFlag;
    }

    public function setReductionFlag($reductionFlag) {
        $this->reductionFlag = $reductionFlag;
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

class RentRefundApplyItem implements \JsonSerializable
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
class RentRefundApplyItem1 implements \JsonSerializable
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
