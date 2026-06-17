<?php

namespace JDRent\Request;

class RentVerifyReturnSignRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $sign;
    /**
    * type: Integer
    */
    private $authStatus;
    /**
    * type: String
    */
    private $attach;
    /**
    * type: String
    */
    private $authNo;

    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getSign() {
        return $this->sign;
    }

    public function setSign($sign) {
        $this->sign = $sign;
    }
    public function getAuthStatus() {
        return $this->authStatus;
    }

    public function setAuthStatus($authStatus) {
        $this->authStatus = $authStatus;
    }
    public function getAttach() {
        return $this->attach;
    }

    public function setAttach($attach) {
        $this->attach = $attach;
    }
    public function getAuthNo() {
        return $this->authNo;
    }

    public function setAuthNo($authNo) {
        $this->authNo = $authNo;
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

