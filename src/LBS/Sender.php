<?php

namespace Joomtriggers\Ideamart\LBS;

use Joomtriggers\Ideamart\Contracts\AddressBrokerInterface;
use Joomtriggers\Ideamart\Contracts\ConfigurationInterface;
use Joomtriggers\Ideamart\Contracts\MessageBrokerInterface;
use Joomtriggers\Ideamart\Contracts\SenderInterface;
use Joomtriggers\Ideamart\Core;

class Sender implements SenderInterface
{
    use Core;

    protected $response = [];

    public function send(
        AddressBrokerInterface $addressBrokerInterface, ConfigurationInterface $configurationInterface, MessageBrokerInterface $messageBrokerInterface = null)
    {
        //"message":"Hello" "destinationAddresses":["tel:94777123456"], "password":"password", "applicationId":"APP_999999"
        $this->response['subscriberId']       = $addressBrokerInterface->getSubscribers()[0];
        $this->response['password']           = $configurationInterface->getSecret();
        $this->response['applicationId']      = $configurationInterface->getApplication();
        $this->response["serviceType"]        = $configurationInterface->getConfiguration('serviceType');
        $this->response["responseTime"]       = $configurationInterface->getConfiguration('responseTime');
        $this->response["freshness"]          = $configurationInterface->getConfiguration('freshness');
        $this->response["horizontalAccuracy"] = $configurationInterface->getConfiguration('horizontalAccuracy');

        return $this->sendRequest(json_encode($this->response), $configurationInterface->getServer());
    }
}