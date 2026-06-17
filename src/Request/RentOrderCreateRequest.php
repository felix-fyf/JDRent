<?php

namespace JDRent\Request;

class RentOrderCreateRequest implements \JsonSerializable
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
    private $sourceApp;
    /**
    * type: OrderCustInfo
    */
    private $orderCustInfo;
    /**
    * type: OrderDetailInfo
    */
    private $orderDetailInfo;
    /**
    * type: List
    */
    private $orderItemList;
    /**
    * type: OrderDeviceInfo
    */
    private $orderDeviceInfo;
    /**
    * type: OrderDeliverInfo
    */
    private $orderDeliverInfo;
    /**
    * type: List
    */
    private $rentPlanList;
    /**
    * type: String
    */
    private $enRelation;
    /**
    * type: String
    */
    private $sourceId;
    /**
    * type: String
    */
    private $rentOrderType;
    /**
    * type: OrderReletInfo
    */
    private $orderReletInfo;

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
    public function getSourceApp() {
        return $this->sourceApp;
    }

    public function setSourceApp($sourceApp) {
        $this->sourceApp = $sourceApp;
    }
    public function getOrderCustInfo() {
        return $this->orderCustInfo;
    }

    public function setOrderCustInfo($orderCustInfo) {
        $this->orderCustInfo = $orderCustInfo;
    }
    public function getOrderDetailInfo() {
        return $this->orderDetailInfo;
    }

    public function setOrderDetailInfo($orderDetailInfo) {
        $this->orderDetailInfo = $orderDetailInfo;
    }
    public function getOrderItemList() {
        return $this->orderItemList;
    }

    public function setOrderItemList($orderItemList) {
        $this->orderItemList = $orderItemList;
    }
    public function getOrderDeviceInfo() {
        return $this->orderDeviceInfo;
    }

    public function setOrderDeviceInfo($orderDeviceInfo) {
        $this->orderDeviceInfo = $orderDeviceInfo;
    }
    public function getOrderDeliverInfo() {
        return $this->orderDeliverInfo;
    }

    public function setOrderDeliverInfo($orderDeliverInfo) {
        $this->orderDeliverInfo = $orderDeliverInfo;
    }
    public function getRentPlanList() {
        return $this->rentPlanList;
    }

    public function setRentPlanList($rentPlanList) {
        $this->rentPlanList = $rentPlanList;
    }
    public function getEnRelation() {
        return $this->enRelation;
    }

    public function setEnRelation($enRelation) {
        $this->enRelation = $enRelation;
    }
    public function getSourceId() {
        return $this->sourceId;
    }

    public function setSourceId($sourceId) {
        $this->sourceId = $sourceId;
    }
    public function getRentOrderType() {
        return $this->rentOrderType;
    }

    public function setRentOrderType($rentOrderType) {
        $this->rentOrderType = $rentOrderType;
    }
    public function getOrderReletInfo() {
        return $this->orderReletInfo;
    }

    public function setOrderReletInfo($orderReletInfo) {
        $this->orderReletInfo = $orderReletInfo;
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

class RentOrderCreateOrderCustInfo implements \JsonSerializable
{
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
    private $customerName;
    /**
    * type: String
    */
    private $customerPhone;
    /**
    * type: String
    */
    private $customerCertType;
    /**
    * type: String
    */
    private $customerCertId;

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
    public function getCustomerName() {
    return $this->customerName;
    }

    public function setCustomerName($customerName) {
    $this->customerName = $customerName;
    }
    public function getCustomerPhone() {
    return $this->customerPhone;
    }

    public function setCustomerPhone($customerPhone) {
    $this->customerPhone = $customerPhone;
    }
    public function getCustomerCertType() {
    return $this->customerCertType;
    }

    public function setCustomerCertType($customerCertType) {
    $this->customerCertType = $customerCertType;
    }
    public function getCustomerCertId() {
    return $this->customerCertId;
    }

    public function setCustomerCertId($customerCertId) {
    $this->customerCertId = $customerCertId;
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
class RentOrderCreateOrderDetailInfo implements \JsonSerializable
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
    /**
    * type: String
    */
    private $extData;

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
    public function getExtData() {
    return $this->extData;
    }

    public function setExtData($extData) {
    $this->extData = $extData;
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
class RentOrderCreateItem implements \JsonSerializable
{
    /**
    * type: String
    */
    private $itemName;
    /**
    * type: String
    */
    private $itemType;
    /**
    * type: String
    */
    private $itemModel;
    /**
    * type: String
    */
    private $itemTitle;
    /**
    * type: String
    */
    private $itemDetailUrl;
    /**
    * type: List
    */
    private $itemImages;
    /**
    * type: Integer
    */
    private $quantity;
    /**
    * type: BigDecimal
    */
    private $unitPrice;
    /**
    * type: String
    */
    private $brandCode;
    /**
    * type: String
    */
    private $outItemNo;
    /**
    * type: String
    */
    private $outSkuNo;
    /**
    * type: String
    */
    private $specData;
    /**
    * type: String
    */
    private $extData;

    public function getItemName() {
    return $this->itemName;
    }

    public function setItemName($itemName) {
    $this->itemName = $itemName;
    }
    public function getItemType() {
    return $this->itemType;
    }

    public function setItemType($itemType) {
    $this->itemType = $itemType;
    }
    public function getItemModel() {
    return $this->itemModel;
    }

    public function setItemModel($itemModel) {
    $this->itemModel = $itemModel;
    }
    public function getItemTitle() {
    return $this->itemTitle;
    }

    public function setItemTitle($itemTitle) {
    $this->itemTitle = $itemTitle;
    }
    public function getItemDetailUrl() {
    return $this->itemDetailUrl;
    }

    public function setItemDetailUrl($itemDetailUrl) {
    $this->itemDetailUrl = $itemDetailUrl;
    }
    public function getItemImages() {
    return $this->itemImages;
    }

    public function setItemImages($itemImages) {
    $this->itemImages = $itemImages;
    }
    public function getQuantity() {
    return $this->quantity;
    }

    public function setQuantity($quantity) {
    $this->quantity = $quantity;
    }
    public function getUnitPrice() {
    return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice) {
    $this->unitPrice = $unitPrice;
    }
    public function getBrandCode() {
    return $this->brandCode;
    }

    public function setBrandCode($brandCode) {
    $this->brandCode = $brandCode;
    }
    public function getOutItemNo() {
    return $this->outItemNo;
    }

    public function setOutItemNo($outItemNo) {
    $this->outItemNo = $outItemNo;
    }
    public function getOutSkuNo() {
    return $this->outSkuNo;
    }

    public function setOutSkuNo($outSkuNo) {
    $this->outSkuNo = $outSkuNo;
    }
    public function getSpecData() {
    return $this->specData;
    }

    public function setSpecData($specData) {
    $this->specData = $specData;
    }
    public function getExtData() {
    return $this->extData;
    }

    public function setExtData($extData) {
    $this->extData = $extData;
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
class RentOrderCreateOrderDeviceInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $unionid;
    /**
    * type: String
    */
    private $eid;
    /**
    * type: String
    */
    private $jsToken;
    /**
    * type: String
    */
    private $sdkToken;
    /**
    * type: String
    */
    private $environmentSign;
    /**
    * type: String
    */
    private $ip;
    /**
    * type: String
    */
    private $longitude;
    /**
    * type: String
    */
    private $latitude;

    public function getUnionid() {
    return $this->unionid;
    }

    public function setUnionid($unionid) {
    $this->unionid = $unionid;
    }
    public function getEid() {
    return $this->eid;
    }

    public function setEid($eid) {
    $this->eid = $eid;
    }
    public function getJsToken() {
    return $this->jsToken;
    }

    public function setJsToken($jsToken) {
    $this->jsToken = $jsToken;
    }
    public function getSdkToken() {
    return $this->sdkToken;
    }

    public function setSdkToken($sdkToken) {
    $this->sdkToken = $sdkToken;
    }
    public function getEnvironmentSign() {
    return $this->environmentSign;
    }

    public function setEnvironmentSign($environmentSign) {
    $this->environmentSign = $environmentSign;
    }
    public function getIp() {
    return $this->ip;
    }

    public function setIp($ip) {
    $this->ip = $ip;
    }
    public function getLongitude() {
    return $this->longitude;
    }

    public function setLongitude($longitude) {
    $this->longitude = $longitude;
    }
    public function getLatitude() {
    return $this->latitude;
    }

    public function setLatitude($latitude) {
    $this->latitude = $latitude;
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
class RentOrderCreateOrderDeliverInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $name;
    /**
    * type: String
    */
    private $mobile;
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
    public function getMobile() {
    return $this->mobile;
    }

    public function setMobile($mobile) {
    $this->mobile = $mobile;
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
class RentPlan implements \JsonSerializable
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
class RentOrderCreateDivisionInfo implements \JsonSerializable
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
class RentOrderCreateOrderReletInfo implements \JsonSerializable
{
    /**
    * type: String
    */
    private $parentOutOrderNo;

    public function getParentOutOrderNo() {
    return $this->parentOutOrderNo;
    }

    public function setParentOutOrderNo($parentOutOrderNo) {
    $this->parentOutOrderNo = $parentOutOrderNo;
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
