<?php

/**
 * Class:Handler
 *
 * PHP Version: 5.6
 *
 * @category Category
 * @package  Package
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://link/
 */
namespace Ideamart\USSD\Ideamart;


//$handler = new \Joomtriggers\Ideamart\Handler();

use Joomtriggers\Ideamart\Contracts\USSD\ProducerInterface;
use Joomtriggers\Ideamart\Contracts\USSD\ReceiverInterface;
use Joomtriggers\Ideamart\Contracts\USSD\SenderInterface;
use Joomtriggers\Ideamart\Contracts\USSD\SessionHandlerInterface;

/**
 * Class:Handler
 *
 * @category Category
 * @package  Package
 * @author   Gnanakeethan Balasubramaniam <gnana@keethan.me>
 * @license  MIT http://opensource.org/licenses/MIT/
 * @link     http://link/
 */
class Handler
{
    protected $request = [];
    protected $sessionHandler;
    protected $receiver;
    protected $sender;
    private $producer;
    private $product;
    private $appRepo;

    /**
     * __construct
     *
     * @param SessionHandler $sessionHandler Session Handling object
     * @param Receiver       $receiver       Receive handler
     * @param Sender         $sender         Send Handler
     * @param Producer       $producer       Menu Manager
     */
    public function __construct(
        SessionHandlerInterface $sessionHandler,
        ReceiverInterface $receiver,
        SenderInterface $sender,
        ProducerInterface $producer
    )
    {
        $this->sessionHandler = $sessionHandler;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->producer = $producer;
    }

    public function receive(array $request)
    {
        $request = $this->receiver->receive($request);
        $this->product = $this->producer
            ->setRequest($request)
            ->translateMessage()
            ->makeMessage();

        return $this;
    }

    public function getOption($option)
    {
    }

    public function setOption($option)
    {
    }

    public function setMessage($custom_message)
    {
    }

    public function setConfiguration($server_details)
    {
    }

    public function setResponse($CONSTANT)
    {
    }

    public function makeResponse()
    {
    }
}
