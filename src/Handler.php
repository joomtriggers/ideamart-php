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
     * Passing to SMS Handler
     *
     * @return SMS\Handler
     */
    public function sms(
    ) {
        $messageBroker;
        $addressBroker;
        $serviceBroker;
        $configurationBroker;
        $sender;
        return new SMS\Handler(
            $addressBroker,
            $messageBroker,
            $serviceBroker,
            $configurationBroker,
            $sender
        );
    }


}
