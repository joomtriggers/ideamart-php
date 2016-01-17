<?php

namespace Ideamart\USSD\Ideamart;

use Ideamart\USSD\Ideamart\Maker\Producer;
use Ideamart\USSD\Ideamart\Receiver\Receiver;
use Ideamart\USSD\Ideamart\Sender\Sender;
use Illuminate\Contracts\Foundation\Application;
use Inqurtime\Source\Applications\ApplicationRepository;
use Inqurtime\System\Session\Contracts\SessionHandler;

/**
 * Class Handler
 * @package Inqurtime\System\USSD\Ideamart
 */
class Handler {

	protected $request = [];

	protected $sessionHandler;

	protected $receiver;

	protected $sender;

	private $application;

	private $producer;

	private $product;

	private $appRepo;

	public function __construct(SessionHandler $sessionHandler,
		Receiver $receiver,
		Sender $sender,
		Producer $producer,
		ApplicationRepository $applicationRepository,
		Application $application
	) {
		$this->sessionHandler = $sessionHandler;
		$this->sender = $sender;
		$this->receiver = $receiver;
		$this->producer = $producer;
		$this->application = $application;
		$this->appRepo = $applicationRepository;
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
