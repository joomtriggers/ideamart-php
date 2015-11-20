<?php

/**
 * Class: Handler
 *
 * PHP Version 5.6
 *
 * @category SMS
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */

namespace Joomtriggers\Ideamart\SMS;


use Joomtriggers\Ideamart\Contracts\AddressBrokerInterface;
use Joomtriggers\Ideamart\Contracts\MessageBrokerInterface;
use Joomtriggers\Ideamart\Contracts\ServiceBrokerInterface;
use Joomtriggers\Ideamart\Contracts\SenderInterface;
use Joomtriggers\Ideamart\Contracts\ConfigurationInterface;

/**
 * Class: Handler
 *
 * @category SMS
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */
class Handler
{

    /**
     * @param mixed
     */
    public function __construct(
        AddressBrokerInterface $addressBroker,
        MessageBrokerInterface $messageBroker,
        ServiceBrokerInterface $serviceBroker,
        ConfigurationInterface $configurationBroker,
        SenderInterface $sender,
        ReceiverInterface $receiver
    ) {
        $this->addressBroker = $addressBroker;
        $this->messageBroker = $messageBroker;
        $this->serviceBroker = $serviceBroker;
        $this->configurationBroker = $configurationBroker;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }


    /**
     * Add Subscriber
     *
     * @param $number String Number of Subscriber
     *
     * @return Handler
     */
    public function addSubscriber($number)
    {
        $this->addressBroker->addSubscriber($number);

        return $this;
    }

    /**
     * Remove Subscriber
     *
     * @return Handler
     */
    public function removeSubscriber($number)
    {
        $this->addressBroker->removeSubscriber($number);

        return $this;
    }

    /**
     * Getting Subscribers
     *
     * @return AddressBrokerInterface
     */
    public function getSubscribers()
    {
        return $this->addressBroker->getSubscribers();
    }


    /**
     * Setting the message to send
     *
     * @return Handler
     */
    public function setMessage($message)
    {
        $this->messageBroker->setMessage($message);

        return $this;
    }

    /**
     * Get the message
     *
     * @return MessageBrokerInterface
     *
     */
    public function getMessage()
    {
        return $this->messageBroker->getMessage();
    }


    /**
     * undocumented function
     *
     * @return void
     */
    public function configure(Array $configuration)
    {
        $this->configurationBroker->configure($configuration);

        return $this;
    }



    /**
     * Send the message
     *
     * @return void
     */
    public function send()
    {

        return $this->sender->send(
            $this->messageBroker,
            $this->addressBroker,
            $this->serviceBroker,
            $this->configurationBroker
        );
    }

    /**
     * Receiving the Request
     *
     * @return Handler
     */
    public function receive($request)
    {
        return $this->receiver->receive($request, $this);
    }


}


