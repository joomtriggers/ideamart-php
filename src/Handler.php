<?php

/**
 * Class: Handler
 *
 * PHP Version 5.6
 *
 * @category Source
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */
namespace Joomtriggers\Ideamart;


use Joomtriggers\Ideamart\Contracts;
use Joomtriggers\Ideamart\SMS\Brokers;
/**
 * Class: Handler
 *
 * @category Source
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */
class Handler
{

    /**
     * __construct
     */
    public function __construct()
    {

    }

    /**
     * Passing SMS to SMS\Handler
     *
     * @param Contracts\MessageBrokerInterface $messageBroker Broker Interface
     * @param Contracts\AddressBrokerInterface $addressBroker Broker Interface
     * @param Contracts\ServiceBrokerInterface $serviceBroker Broker Interface
     * @param Contracts\ConfigurationInterface $configurationBroker Broker Interface
     * @param Contracts\SenderInterface $sender Broker Interface
     * @param Contracts\ReceiverInterface $receiver
     * @return SMS\Handler
     */
    public function sms(
        Contracts\MessageBrokerInterface $messageBroker = null,
        Contracts\AddressBrokerInterface $addressBroker = null,
        Contracts\ConfigurationInterface $configurationBroker = null,
        Contracts\SenderInterface $sender = null,
        Contracts\ReceiverInterface $receiver = null
    ) {
        $messageBroker = $messageBroker?$messageBroker:new Brokers\MessageBroker();
        $addressBroker = $addressBroker?$addressBroker:new Brokers\AddressBroker();
        $configurationBroker = $configurationBroker?$configurationBroker:new SMS\Configuration();
        $sender = $sender?$sender:new SMS\Sender();
        $receiver = $receiver?$receiver:new SMS\Receiver();
        return new SMS\Handler(
            $addressBroker,
            $messageBroker,
            $configurationBroker,
            $sender,
            $receiver
        );
    }



}
