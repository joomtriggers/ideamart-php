<?php

namespace Joomtriggers\Ideamart\SMS\Brokers;

class AddressBroker implements AddressBrokerInterface
{

    private $numbers;

    /**
     *
     */
    public function __construct()
    {
    }
    /**
     * Adding Subscriber
     *
     * @param string $number Number of Subscribers
     *
     * @return void
     */
    public function addSubscriber($number)
    {
        $this->numbers[] = $number;
        $this->numbers = array_unique(array_filter($this->numbers));
    }

    /**
     * Remove Certain Subscribers
     *
     * @return void
     */
    public function removeSubscriber($number)
    {
        if(($key = array_search($number, $this->numbers)) !== false) {
            unset($this->numbers[$key]);
        }
    }


}
