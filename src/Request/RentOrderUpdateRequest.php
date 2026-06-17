<?php

namespace JDRent\Request;

class RentOrderUpdateRequest implements \JsonSerializable
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
    private $orderApplyTime;
    /**
    * type: String
    */
    private $orderModifiedTime;
    /**
    * type: String
    */
    private $sourceApp;
    /**
    * type: OrderDetailInfo
    */
    private $orderDetailInfo;

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
    public function getOrderApplyTime() {
        return $this->orderApplyTime;
    }

    public function setOrderApplyTime($orderApplyTime) {
        $this->orderApplyTime = $orderApplyTime;
    }
    public function getOrderModifiedTime() {
        return $this->orderModifiedTime;
    }

    public function setOrderModifiedTime($orderModifiedTime) {
        $this->orderModifiedTime = $orderModifiedTime;
    }
    public function getSourceApp() {
        return $this->sourceApp;
    }

    public function setSourceApp($sourceApp) {
        $this->sourceApp = $sourceApp;
    }
    public function getOrderDetailInfo() {
        return $this->orderDetailInfo;
    }

    public function setOrderDetailInfo($orderDetailInfo) {
        $this->orderDetailInfo = $orderDetailInfo;
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

class RentOrderUpdateOrderDetailInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $orderType;
    /**
    * type: String
    */
    private $orderStatus;
    /**
    * type: String
    */
    private $rentType;
    /**
    * type: BigDecimal
    */
    private $orderTotalAmt;
    /**
    * type: BigDecimal
    */
    private $payAmt;
    /**
    * type: BigDecimal
    */
    private $discountAmt;
    /**
    * type: String
    */
    private $orderDetailUrl;
    /**
    * type: BigDecimal
    */
    private $rentTotalAmt;
    /**
    * type: BigDecimal
    */
    private $periodRentAmt;
    /**
    * type: Integer
    */
    private $rentTerm;
    /**
    * type: String
    */
    private $termUnit;
    /**
    * type: BigDecimal
    */
    private $firstPeriodRentAmt;
    /**
    * type: BigDecimal
    */
    private $firstPayAmt;
    /**
    * type: BigDecimal
    */
    private $depositAmt;
    /**
    * type: String
    */
    private $orderSendTime;
    /**
    * type: String
    */
    private $courierNumber;
    /**
    * type: BigDecimal
    */
    private $deliveryAmount;
    /**
    * type: String
    */
    private $deliveryMethod;
    /**
    * type: String
    */
    private $orderRentStartDate;
    /**
    * type: String
    */
    private $orderRentEndDate;
    /**
    * type: String
    */
    private $orderSignTime;
    /**
    * type: String
    */
    private $planBackDate;
    /**
    * type: BigDecimal
    */
    private $buyoutAmt;
    /**
    * type: BigDecimal
    */
    private $paymentAmt;
    /**
    * type: String
    */
    private $realDate;
    /**
    * type: String
    */
    private $orderApproveTime;
    /**
    * type: String
    */
    private $orderPayTime;
    /**
    * type: String
    */
    private $orderFinishTime;

    public function getOrderType() {
    return $this->orderType;
    }

    public function setOrderType($orderType) {
    $this->orderType = $orderType;
    }
    public function getOrderStatus() {
    return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
    $this->orderStatus = $orderStatus;
    }
    public function getRentType() {
    return $this->rentType;
    }

    public function setRentType($rentType) {
    $this->rentType = $rentType;
    }
    public function getOrderTotalAmt() {
    return $this->orderTotalAmt;
    }

    public function setOrderTotalAmt($orderTotalAmt) {
    $this->orderTotalAmt = $orderTotalAmt;
    }
    public function getPayAmt() {
    return $this->payAmt;
    }

    public function setPayAmt($payAmt) {
    $this->payAmt = $payAmt;
    }
    public function getDiscountAmt() {
    return $this->discountAmt;
    }

    public function setDiscountAmt($discountAmt) {
    $this->discountAmt = $discountAmt;
    }
    public function getOrderDetailUrl() {
    return $this->orderDetailUrl;
    }

    public function setOrderDetailUrl($orderDetailUrl) {
    $this->orderDetailUrl = $orderDetailUrl;
    }
    public function getRentTotalAmt() {
    return $this->rentTotalAmt;
    }

    public function setRentTotalAmt($rentTotalAmt) {
    $this->rentTotalAmt = $rentTotalAmt;
    }
    public function getPeriodRentAmt() {
    return $this->periodRentAmt;
    }

    public function setPeriodRentAmt($periodRentAmt) {
    $this->periodRentAmt = $periodRentAmt;
    }
    public function getRentTerm() {
    return $this->rentTerm;
    }

    public function setRentTerm($rentTerm) {
    $this->rentTerm = $rentTerm;
    }
    public function getTermUnit() {
    return $this->termUnit;
    }

    public function setTermUnit($termUnit) {
    $this->termUnit = $termUnit;
    }
    public function getFirstPeriodRentAmt() {
    return $this->firstPeriodRentAmt;
    }

    public function setFirstPeriodRentAmt($firstPeriodRentAmt) {
    $this->firstPeriodRentAmt = $firstPeriodRentAmt;
    }
    public function getFirstPayAmt() {
    return $this->firstPayAmt;
    }

    public function setFirstPayAmt($firstPayAmt) {
    $this->firstPayAmt = $firstPayAmt;
    }
    public function getDepositAmt() {
    return $this->depositAmt;
    }

    public function setDepositAmt($depositAmt) {
    $this->depositAmt = $depositAmt;
    }
    public function getOrderSendTime() {
    return $this->orderSendTime;
    }

    public function setOrderSendTime($orderSendTime) {
    $this->orderSendTime = $orderSendTime;
    }
    public function getCourierNumber() {
    return $this->courierNumber;
    }

    public function setCourierNumber($courierNumber) {
    $this->courierNumber = $courierNumber;
    }
    public function getDeliveryAmount() {
    return $this->deliveryAmount;
    }

    public function setDeliveryAmount($deliveryAmount) {
    $this->deliveryAmount = $deliveryAmount;
    }
    public function getDeliveryMethod() {
    return $this->deliveryMethod;
    }

    public function setDeliveryMethod($deliveryMethod) {
    $this->deliveryMethod = $deliveryMethod;
    }
    public function getOrderRentStartDate() {
    return $this->orderRentStartDate;
    }

    public function setOrderRentStartDate($orderRentStartDate) {
    $this->orderRentStartDate = $orderRentStartDate;
    }
    public function getOrderRentEndDate() {
    return $this->orderRentEndDate;
    }

    public function setOrderRentEndDate($orderRentEndDate) {
    $this->orderRentEndDate = $orderRentEndDate;
    }
    public function getOrderSignTime() {
    return $this->orderSignTime;
    }

    public function setOrderSignTime($orderSignTime) {
    $this->orderSignTime = $orderSignTime;
    }
    public function getPlanBackDate() {
    return $this->planBackDate;
    }

    public function setPlanBackDate($planBackDate) {
    $this->planBackDate = $planBackDate;
    }
    public function getBuyoutAmt() {
    return $this->buyoutAmt;
    }

    public function setBuyoutAmt($buyoutAmt) {
    $this->buyoutAmt = $buyoutAmt;
    }
    public function getPaymentAmt() {
    return $this->paymentAmt;
    }

    public function setPaymentAmt($paymentAmt) {
    $this->paymentAmt = $paymentAmt;
    }
    public function getRealDate() {
    return $this->realDate;
    }

    public function setRealDate($realDate) {
    $this->realDate = $realDate;
    }
    public function getOrderApproveTime() {
    return $this->orderApproveTime;
    }

    public function setOrderApproveTime($orderApproveTime) {
    $this->orderApproveTime = $orderApproveTime;
    }
    public function getOrderPayTime() {
    return $this->orderPayTime;
    }

    public function setOrderPayTime($orderPayTime) {
    $this->orderPayTime = $orderPayTime;
    }
    public function getOrderFinishTime() {
    return $this->orderFinishTime;
    }

    public function setOrderFinishTime($orderFinishTime) {
    $this->orderFinishTime = $orderFinishTime;
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
