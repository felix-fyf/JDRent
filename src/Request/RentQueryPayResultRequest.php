<?php

namespace JDRent\Request;

class RentQueryPayResultRequest implements \JsonSerializable
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
    private $businessType;

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
    public function getBusinessType() {
        return $this->businessType;
    }

    public function setBusinessType($businessType) {
        $this->businessType = $businessType;
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

