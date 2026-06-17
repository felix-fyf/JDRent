<?php

namespace JDRent\Request;

class RentOrderModifyRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $outOrderNo;
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
    /**
    * type: List
    */
    private $rentPlanList;
    /**
    * type: OrderDeliverInfo
    */
    private $orderDeliverInfo;

    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getOutOrderNo() {
        return $this->outOrderNo;
    }

    public function setOutOrderNo($outOrderNo) {
        $this->outOrderNo = $outOrderNo;
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
    public function getRentPlanList() {
        return $this->rentPlanList;
    }

    public function setRentPlanList($rentPlanList) {
        $this->rentPlanList = $rentPlanList;
    }
    public function getOrderDeliverInfo() {
        return $this->orderDeliverInfo;
    }

    public function setOrderDeliverInfo($orderDeliverInfo) {
        $this->orderDeliverInfo = $orderDeliverInfo;
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

class RentOrderModifyOrderDetailInfo implements \JsonSerializable
{
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
    * type: BigDecimal
    */
    private $rentTotalAmt;
    /**
    * type: BigDecimal
    */
    private $firstPayAmt;
    /**
    * type: BigDecimal
    */
    private $firstPeriodRentAmt;
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
    private $depositAmt;
    /**
    * type: BigDecimal
    */
    private $deliveryAmt;
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
    private $extData;
    /**
    * type: String
    */
    private $rentType;
    /**
    * type: String
    */
    private $orderDetailUrl;

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
    public function getRentTotalAmt() {
    return $this->rentTotalAmt;
    }

    public function setRentTotalAmt($rentTotalAmt) {
    $this->rentTotalAmt = $rentTotalAmt;
    }
    public function getFirstPayAmt() {
    return $this->firstPayAmt;
    }

    public function setFirstPayAmt($firstPayAmt) {
    $this->firstPayAmt = $firstPayAmt;
    }
    public function getFirstPeriodRentAmt() {
    return $this->firstPeriodRentAmt;
    }

    public function setFirstPeriodRentAmt($firstPeriodRentAmt) {
    $this->firstPeriodRentAmt = $firstPeriodRentAmt;
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
    public function getDepositAmt() {
    return $this->depositAmt;
    }

    public function setDepositAmt($depositAmt) {
    $this->depositAmt = $depositAmt;
    }
    public function getDeliveryAmt() {
    return $this->deliveryAmt;
    }

    public function setDeliveryAmt($deliveryAmt) {
    $this->deliveryAmt = $deliveryAmt;
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
    public function getExtData() {
    return $this->extData;
    }

    public function setExtData($extData) {
    $this->extData = $extData;
    }
    public function getRentType() {
    return $this->rentType;
    }

    public function setRentType($rentType) {
    $this->rentType = $rentType;
    }
    public function getOrderDetailUrl() {
    return $this->orderDetailUrl;
    }

    public function setOrderDetailUrl($orderDetailUrl) {
    $this->orderDetailUrl = $orderDetailUrl;
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
class RentOrderModifyRentPlan implements \JsonSerializable
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
class RentOrderModifyDivisionInfo implements \JsonSerializable
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
class RentOrderModifyOrderDeliverInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $name;
    /**
    * type: String
    */
    private $address;
    /**
    * type: String
    */
    private $country;
    /**
    * type: String
    */
    private $mobile;
    /**
    * type: String
    */
    private $provinceName;
    /**
    * type: String
    */
    private $cityName;
    /**
    * type: String
    */
    private $countyName;
    /**
    * type: String
    */
    private $street;
    /**
    * type: String
    */
    private $type;

    public function getName() {
    return $this->name;
    }

    public function setName($name) {
    $this->name = $name;
    }
    public function getAddress() {
    return $this->address;
    }

    public function setAddress($address) {
    $this->address = $address;
    }
    public function getCountry() {
    return $this->country;
    }

    public function setCountry($country) {
    $this->country = $country;
    }
    public function getMobile() {
    return $this->mobile;
    }

    public function setMobile($mobile) {
    $this->mobile = $mobile;
    }
    public function getProvinceName() {
    return $this->provinceName;
    }

    public function setProvinceName($provinceName) {
    $this->provinceName = $provinceName;
    }
    public function getCityName() {
    return $this->cityName;
    }

    public function setCityName($cityName) {
    $this->cityName = $cityName;
    }
    public function getCountyName() {
    return $this->countyName;
    }

    public function setCountyName($countyName) {
    $this->countyName = $countyName;
    }
    public function getStreet() {
    return $this->street;
    }

    public function setStreet($street) {
    $this->street = $street;
    }
    public function getType() {
    return $this->type;
    }

    public function setType($type) {
    $this->type = $type;
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
