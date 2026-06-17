<?php

namespace JDRent\Request;

class RentUpdateOrderStatusRequest implements \JsonSerializable
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
    private $orderStatus;
    /**
    * type: String
    */
    private $orderApproveTime;
    /**
    * type: String
    */
    private $orderSendTime;
    /**
    * type: String
    */
    private $courierNumber;
    /**
    * type: String
    */
    private $orderPayTime;
    /**
    * type: String
    */
    private $orderSignTime;
    /**
    * type: String
    */
    private $orderFinishTime;

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
    public function getOrderStatus() {
        return $this->orderStatus;
    }

    public function setOrderStatus($orderStatus) {
        $this->orderStatus = $orderStatus;
    }
    public function getOrderApproveTime() {
        return $this->orderApproveTime;
    }

    public function setOrderApproveTime($orderApproveTime) {
        $this->orderApproveTime = $orderApproveTime;
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
    public function getOrderPayTime() {
        return $this->orderPayTime;
    }

    public function setOrderPayTime($orderPayTime) {
        $this->orderPayTime = $orderPayTime;
    }
    public function getOrderSignTime() {
        return $this->orderSignTime;
    }

    public function setOrderSignTime($orderSignTime) {
        $this->orderSignTime = $orderSignTime;
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

