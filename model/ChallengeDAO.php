<?php

class ChallengeDAO
{
    protected $challenge;

    function __construct()
    {
        $this->challenge = $this->getToken();

        $sessionName = $this->getSesionName($this->challenge->getToken());

        $this->challenge->setSessionName($sessionName);
    }

    public function getChallenge()
    {
        return $this->challenge;
    }

    public function getToken()
    {
        //peticion GET1. getchallenge https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba
        $url = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);
        $challenge = new Challenge($response['result']['token'], $response['result']['expireTime'], $response['result']['serverTime']);

        return $challenge;
    }

    public function getSesionName($token)
    {
        //peticion POST2. login https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php
        $url = "https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "operation=login&username=prueba&accessKey=" . md5($token . '3DlKwKDMqPsiiK0B'));
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);
        $sessionName = $response['result']['sessionName'];
        return $sessionName;
    }
}
