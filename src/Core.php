<?php

namespace Joomtriggers\Ideamart;


trait Core {

    /**
     * @param $jsonResponse
     * @param $url
     */
    public function sendRequest($jsonResponse, $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonResponse);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

//        $this->log->info("SENDING REQUEST :" . $jsonResponse);
//        $this->log->info("SENDING REQUEST TO URL:" . $url);
//        $this->log->info("RECEIVED RESPONSE :" . $response);
        var_dump($jsonResponse);
        var_dump($url);
        var_dump($response);
        return $response;
    }
}

