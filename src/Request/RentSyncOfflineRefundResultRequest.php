<?php

namespace JDRent\Request;

class RentSyncOfflineRefundResultRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $refundApplyNo;
    /**
    * type: String
    */
    private $originOutApplyNo;
    /**
    * type: String
    */
    private $outOrderNo;
    /**
    * type: String
    */
    private $payChannel;
    /**
    * type: String
    */
    private $finishTime;
    /**
    * type: BigDecimal
    */
    private $refundAmt;
    /**
    * type: String
    */
    private $reductionFlag;
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
    public function getRefundApplyNo() {
        return $this->refundApplyNo;
    }

    public function setRefundApplyNo($refundApplyNo) {
        $this->refundApplyNo = $refundApplyNo;
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
    public function getPayChannel() {
        return $this->payChannel;
    }

    public function setPayChannel($payChannel) {
        $this->payChannel = $payChannel;
    }
    public function getFinishTime() {
        return $this->finishTime;
    }

    public function setFinishTime($finishTime) {
        $this->finishTime = $finishTime;
    }
    public function getRefundAmt() {
        return $this->refundAmt;
    }

    public function setRefundAmt($refundAmt) {
        $this->refundAmt = $refundAmt;
    }
    public function getReductionFlag() {
        return $this->reductionFlag;
    }

    public function setReductionFlag($reductionFlag) {
        $this->reductionFlag = $reductionFlag;
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

class RentSyncOfflineRefundResultFeeDetail implements \JsonSerializable
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
