<?php

namespace Joomtriggers\Ideamart\Contracts;

interface AddressBrokerInterface {
    public function addSubscriber($number);
    public function removeSubscriber($number);
    public function getSubscribers();
}
