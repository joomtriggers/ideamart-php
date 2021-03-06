<?php

namespace Joomtriggers\Ideamart\SMS;

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
        if ($messageBrokerInterface !== null) {
            $this->response['message'] = $messageBrokerInterface->getMessage();
        }
        $this->response['destinationAddresses'] = $addressBrokerInterface->getSubscribers();
        $this->response['password']             = $configurationInterface->getSecret();
        $this->response['applicationId']        = $configurationInterface->getApplication();

        return $this->sendRequest(json_encode($this->response), $configurationInterface->getServer());
    }
}