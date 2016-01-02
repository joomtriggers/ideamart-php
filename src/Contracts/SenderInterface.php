<?php

namespace Joomtriggers\Ideamart\Contracts;

interface SenderInterface
{

    public function send(
        MessageBrokerInterface $messageBrokerInterface,
        AddressBrokerInterface $addressBrokerInterface,
        ServiceBrokerInterface $serviceBrokerInterface,
        ConfigurationInterface $configurationInterface);
}


