<?php

namespace JDRent\Support\Models;

class SdkResponse implements \JsonSerializable
{
    private $code;
    private $msg;
    private $bizContent;
    private $respondTime;

    public function __construct($code, $msg, $bizContent, $respondTime)
    {
        $this->code = $code;
        $this->msg = $msg;
        $this->bizContent = $bizContent;
        $this->respondTime = $respondTime;
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
