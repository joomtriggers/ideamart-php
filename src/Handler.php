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

use Contracts;
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
     * @param Contracts\MessageBrokerInterface $messageBroker       Broker Interface
     * @param Contracts\AddressBrokerInterface $addressBroker       Broker Interface
     * @param Contracts\ServiceBrokerInterface $serviceBroker       Broker Interface
     * @param Contracts\ConfigurationInterface $configurationBroker Broker Interface
     * @param Contracts\SenderInterface        $sender              Broker Interface
     *
     * @return SMS\Handler()
     */
    public function sms(
        Contracts\MessageBrokerInterface $messageBroker = null,
        Contracts\AddressBrokerInterface $addressBroker = null,
        Contracts\ServiceBrokerInterface $serviceBroker = null,
        Contracts\ConfigurationInterface $configurationBroker = null,
        Contracts\SenderInterface $sender = null
    ) {
        $messageBroker = $messageBroker?$messageBroker:new MessageBroker();
        $addressBroker = $addressBroker?$addressBroker:new AddressBroker();
        $serviceBroker = $serviceBroker?$serviceBroker:new ServiceBroker();
        $configurationBroker = $configurationBroker?$configurationBroker:new Configuration();
        $sender = $sender?$sender:new Sender();
        return new SMS\Handler(
            $addressBroker,
            $messageBroker,
            $serviceBroker,
            $configurationBroker,
            $sender
        );
    }


}
