<?php

namespace JDRent\Request;

class RentUploadRequest implements \JsonSerializable
{
    /**
    * type: String
    */
    private $reqNo;
    /**
    * type: String
    */
    private $fileName;
    /**
    * type: String
    */
    private $uploadScene;
    /**
    * type: String
    */
    private $base64;

    public function getReqNo() {
        return $this->reqNo;
    }

    public function setReqNo($reqNo) {
        $this->reqNo = $reqNo;
    }
    public function getFileName() {
        return $this->fileName;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    public function getUploadScene() {
        return $this->uploadScene;
    }

    public function setUploadScene($uploadScene) {
        $this->uploadScene = $uploadScene;
    }
    public function getBase64() {
        return $this->base64;
    }

    public function setBase64($base64) {
        $this->base64 = $base64;
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

