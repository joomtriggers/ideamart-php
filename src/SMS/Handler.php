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

namespace Joomtriggers\Ideamart\Handler;

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
    public function __construct()
    {
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
        return $this;
    }

    /**
     * remove Subscriber
     *
     * @return Handler
     */
    public function removeSubscriber($number)
    {
        return $this;
    }

    /**
     * Setting the message to send
     *
     * @return Handler
     */
    public function setMessage($message)
    {
        return $this;
    }


    /**
     * Send the message
     *
     * @return void
     */
    public function send()
    {

    }

}


