<?php

namespace JDRent\Request;

class RentItemUpdateRequest implements \JsonSerializable
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
    private $outItemNo;
    /**
    * type: String
    */
    private $itemModifiedTime;
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
    private $brandCode;
    /**
    * type: String
    */
    private $itemTitle;
    /**
    * type: String
    */
    private $categoryId;
    /**
    * type: List
    */
    private $itemImages;
    /**
    * type: List
    */
    private $itemSubImages;
    /**
    * type: String
    */
    private $itemDetailUrl;
    /**
    * type: BigDecimal
    */
    private $minRentAmt;
    /**
    * type: Integer
    */
    private $minRentTerm;
    /**
    * type: String
    */
    private $minTermUnit;
    /**
    * type: String
    */
    private $itemDetailDesc;
    /**
    * type: String
    */
    private $appearance;
    /**
    * type: String
    */
    private $buyout;
    /**
    * type: String
    */
    private $continueRent;
    /**
    * type: String
    */
    private $freePledge;
    /**
    * type: List
    */
    private $securityServices;
    /**
    * type: List
    */
    private $skuList;
    /**
    * type: String
    */
    private $extData;
    /**
    * type: String
    */
    private $modelCode;
    /**
    * type: Boolean
    */
    private $autoRelease;

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
    public function getOutItemNo() {
        return $this->outItemNo;
    }

    public function setOutItemNo($outItemNo) {
        $this->outItemNo = $outItemNo;
    }
    public function getItemModifiedTime() {
        return $this->itemModifiedTime;
    }

    public function setItemModifiedTime($itemModifiedTime) {
        $this->itemModifiedTime = $itemModifiedTime;
    }
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
    public function getBrandCode() {
        return $this->brandCode;
    }

    public function setBrandCode($brandCode) {
        $this->brandCode = $brandCode;
    }
    public function getItemTitle() {
        return $this->itemTitle;
    }

    public function setItemTitle($itemTitle) {
        $this->itemTitle = $itemTitle;
    }
    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }
    public function getItemImages() {
        return $this->itemImages;
    }

    public function setItemImages($itemImages) {
        $this->itemImages = $itemImages;
    }
    public function getItemSubImages() {
        return $this->itemSubImages;
    }

    public function setItemSubImages($itemSubImages) {
        $this->itemSubImages = $itemSubImages;
    }
    public function getItemDetailUrl() {
        return $this->itemDetailUrl;
    }

    public function setItemDetailUrl($itemDetailUrl) {
        $this->itemDetailUrl = $itemDetailUrl;
    }
    public function getMinRentAmt() {
        return $this->minRentAmt;
    }

    public function setMinRentAmt($minRentAmt) {
        $this->minRentAmt = $minRentAmt;
    }
    public function getMinRentTerm() {
        return $this->minRentTerm;
    }

    public function setMinRentTerm($minRentTerm) {
        $this->minRentTerm = $minRentTerm;
    }
    public function getMinTermUnit() {
        return $this->minTermUnit;
    }

    public function setMinTermUnit($minTermUnit) {
        $this->minTermUnit = $minTermUnit;
    }
    public function getItemDetailDesc() {
        return $this->itemDetailDesc;
    }

    public function setItemDetailDesc($itemDetailDesc) {
        $this->itemDetailDesc = $itemDetailDesc;
    }
    public function getAppearance() {
        return $this->appearance;
    }

    public function setAppearance($appearance) {
        $this->appearance = $appearance;
    }
    public function getBuyout() {
        return $this->buyout;
    }

    public function setBuyout($buyout) {
        $this->buyout = $buyout;
    }
    public function getContinueRent() {
        return $this->continueRent;
    }

    public function setContinueRent($continueRent) {
        $this->continueRent = $continueRent;
    }
    public function getFreePledge() {
        return $this->freePledge;
    }

    public function setFreePledge($freePledge) {
        $this->freePledge = $freePledge;
    }
    public function getSecurityServices() {
        return $this->securityServices;
    }

    public function setSecurityServices($securityServices) {
        $this->securityServices = $securityServices;
    }
    public function getSkuList() {
        return $this->skuList;
    }

    public function setSkuList($skuList) {
        $this->skuList = $skuList;
    }
    public function getExtData() {
        return $this->extData;
    }

    public function setExtData($extData) {
        $this->extData = $extData;
    }
    public function getModelCode() {
        return $this->modelCode;
    }

    public function setModelCode($modelCode) {
        $this->modelCode = $modelCode;
    }
    public function getAutoRelease() {
        return $this->autoRelease;
    }

    public function setAutoRelease($autoRelease) {
        $this->autoRelease = $autoRelease;
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

class RentItemUpdateItem implements \JsonSerializable
{
    /**
    * type: String
    */
    private $outSkuNo;
    /**
    * type: String
    */
    private $specData;
    /**
    * type: Integer
    */
    private $stockNum;
    /**
    * type: List
    */
    private $skuImages;
    /**
    * type: String
    */
    private $skuStatus;
    /**
    * type: String
    */
    private $skuType;
    /**
    * type: String
    */
    private $barCode;
    /**
    * type: BigDecimal
    */
    private $skuAmt;
    /**
    * type: BigDecimal
    */
    private $originalAmt;
    /**
    * type: List
    */
    private $rentOptionList;
    /**
    * type: String
    */
    private $specParam;

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
    public function getStockNum() {
    return $this->stockNum;
    }

    public function setStockNum($stockNum) {
    $this->stockNum = $stockNum;
    }
    public function getSkuImages() {
    return $this->skuImages;
    }

    public function setSkuImages($skuImages) {
    $this->skuImages = $skuImages;
    }
    public function getSkuStatus() {
    return $this->skuStatus;
    }

    public function setSkuStatus($skuStatus) {
    $this->skuStatus = $skuStatus;
    }
    public function getSkuType() {
    return $this->skuType;
    }

    public function setSkuType($skuType) {
    $this->skuType = $skuType;
    }
    public function getBarCode() {
    return $this->barCode;
    }

    public function setBarCode($barCode) {
    $this->barCode = $barCode;
    }
    public function getSkuAmt() {
    return $this->skuAmt;
    }

    public function setSkuAmt($skuAmt) {
    $this->skuAmt = $skuAmt;
    }
    public function getOriginalAmt() {
    return $this->originalAmt;
    }

    public function setOriginalAmt($originalAmt) {
    $this->originalAmt = $originalAmt;
    }
    public function getRentOptionList() {
    return $this->rentOptionList;
    }

    public function setRentOptionList($rentOptionList) {
    $this->rentOptionList = $rentOptionList;
    }
    public function getSpecParam() {
    return $this->specParam;
    }

    public function setSpecParam($specParam) {
    $this->specParam = $specParam;
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
class RentItemUpdateItem1 implements \JsonSerializable
{
    /**
    * type: String
    */
    private $rentType;
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
    private $totalRentAmt;
    /**
    * type: BigDecimal
    */
    private $dailyRentAmt;
    /**
    * type: BigDecimal
    */
    private $dailyRentOriginalAmt;
    /**
    * type: BigDecimal
    */
    private $totalRentOriginalAmt;
    /**
    * type: BigDecimal
    */
    private $buyOutAmt;

    public function getRentType() {
    return $this->rentType;
    }

    public function setRentType($rentType) {
    $this->rentType = $rentType;
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
    public function getTotalRentAmt() {
    return $this->totalRentAmt;
    }

    public function setTotalRentAmt($totalRentAmt) {
    $this->totalRentAmt = $totalRentAmt;
    }
    public function getDailyRentAmt() {
    return $this->dailyRentAmt;
    }

    public function setDailyRentAmt($dailyRentAmt) {
    $this->dailyRentAmt = $dailyRentAmt;
    }
    public function getDailyRentOriginalAmt() {
    return $this->dailyRentOriginalAmt;
    }

    public function setDailyRentOriginalAmt($dailyRentOriginalAmt) {
    $this->dailyRentOriginalAmt = $dailyRentOriginalAmt;
    }
    public function getTotalRentOriginalAmt() {
    return $this->totalRentOriginalAmt;
    }

    public function setTotalRentOriginalAmt($totalRentOriginalAmt) {
    $this->totalRentOriginalAmt = $totalRentOriginalAmt;
    }
    public function getBuyOutAmt() {
    return $this->buyOutAmt;
    }

    public function setBuyOutAmt($buyOutAmt) {
    $this->buyOutAmt = $buyOutAmt;
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
