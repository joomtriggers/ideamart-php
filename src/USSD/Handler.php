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
//$handler->ussd()
    //->receive($request_array)
    //->getOption($option)
    //->setOption($option)
    //->setMenu($menu_config)
    //->setMessage($custom_message)
    //->setConfiguration($server_details)
    //->setResponse(MT_FIN)
    //->makeResponse();

use Ideamart\USSD\Ideamart\Maker\Producer;
use Ideamart\USSD\Ideamart\Receiver\Receiver;
use Ideamart\USSD\Ideamart\Sender\Sender;

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
        SessionHandler $sessionHandler,
        Receiver $receiver,
        Sender $sender,
        Producer $producer
    ) {
        $this->sessionHandler = $sessionHandler;
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->producer = $producer;
    }

    /**
     * @param array $request
     *
     * @return $this
     */
    public function handle(array $request) {
        $request = $this->receiver->receive($request);

        $this->product = $this->producer
            ->loadSetup()
            ->setRequest($request)
            ->translateMessage($this->appRepo)
            ->makeMessage();

        return $this;
    }

    public function setCustomResponse($response) {
        $this->product = $response;

        return $this;
    }

    public function setCustomOperation($operation) {
        $this->sessionHandler->setOperation($operation);

        return $this;

    }

    /**
     * @return mixed
     */
    public function makeResponse() {
        return $this->sender->send($this->product);
    }
}
