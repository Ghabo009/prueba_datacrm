<?php

class Challenge
{
    var $token;
    var $expireTime;
    var $serverTime;
    var $sessionName;

    function __construct($token, $expireTime, $serverTime)
    {
        $this->token = $token;
        $this->expireTime = $expireTime;
        $this->serverTime = $serverTime;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getExpireTime()
    {
        return $this->expireTime;
    }

    public function getServerTime()
    {
        return $this->serverTime;
    }

    public function getSessionName()
    {
        return $this->sessionName;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setExpireTime($expireTime)
    {
        $this->expireTime = $expireTime;
    }

    public function setServerTime($serverTime)
    {
        $this->serverTime = $serverTime;
    }

    public function setSessionName($sessionName)
    {
        $this->sessionName = $sessionName;
    }
}
