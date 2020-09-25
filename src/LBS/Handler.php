<?php
/**
 * Class: Handler
 *
 * PHP Version 5.6
 *
 * @category LBS
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */

namespace Joomtriggers\Ideamart\LBS;

use Joomtriggers\Ideamart\Contracts\AddressBrokerInterface;
use Joomtriggers\Ideamart\Contracts\ConfigurationInterface;
use Joomtriggers\Ideamart\Contracts\SenderInterface;

/**
 * Class: Handler
 *
 * @category LBS
 * @package  Ideamart
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://github.com/joomtriggers/ideamart-php/
 */
class Handler
{
    private $_mode = "sending";
    /**
     * @var \Joomtriggers\Ideamart\Contracts\AddressBrokerInterface
     */
    public $addressBroker;
    /**
     * @var \Joomtriggers\Ideamart\Contracts\ConfigurationInterface
     */
    public $configurationBroker;
    /**
     * @var \Joomtriggers\Ideamart\Contracts\SenderInterface
     */
    public $sender;

    public function __construct(
        AddressBrokerInterface $addressBroker,
        ConfigurationInterface $configurationBroker,
        SenderInterface $sender
    )
    {
        $this->addressBroker       = $addressBroker;
        $this->configurationBroker = $configurationBroker;
        $this->sender              = $sender;
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

    public function configure(array $configuration)
    {
        $this->configurationBroker->configure($configuration);

        return $this;
    }

    public function getConfigurations()
    {
        return $this->configurationBroker->getConfigurations();
    }

    public function getConfiguration($key)
    {
        return $this->configurationBroker->getConfiguration($key);
    }

    public function setConfiguration($key, $value)
    {
        $this->configurationBroker->setConfiguration($key, $value);

        return $this;
    }

    public function setApplication($app)
    {
        $this->configurationBroker->setConfiguration('APP_ID', $app);

        return $this;
    }

    public function setServer($server)
    {
        $this->configurationBroker->setConfiguration('SERVER_URL', $server);

        return $this;
    }

    public function setSecret($secret)
    {
        $this->configurationBroker->setConfiguration('APP_SECRET', $secret);

        return $this;
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->sender->send(
            $this->addressBroker,
            $this->configurationBroker);
    }
}


