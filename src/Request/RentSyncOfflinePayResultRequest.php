<?php

namespace JDRent\Request;

class RentSyncOfflinePayResultRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
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
    private $payChannel;
    /**
    * type: String
    */
    private $finishTime;
    /**
    * type: BigDecimal
    */
    private $payAmt;
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
    public function getPayAmt() {
        return $this->payAmt;
    }

    public function setPayAmt($payAmt) {
        $this->payAmt = $payAmt;
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

class RentSyncOfflinePayResultFeeDetail implements \JsonSerializable
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
