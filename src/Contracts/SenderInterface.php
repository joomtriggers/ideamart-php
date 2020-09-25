<?php

namespace Joomtriggers\Ideamart\Contracts;
interface SenderInterface
{
    public function send(
        AddressBrokerInterface $addressBrokerInterface, ConfigurationInterface $configurationInterface, MessageBrokerInterface $messageBrokerInterface = null);
}


