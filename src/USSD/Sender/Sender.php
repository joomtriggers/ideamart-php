<?php

namespace Ideamart\USSD\Ideamart\Sender;

use Ideamart\USSD\Ideamart\Core;
use Ideamart\USSD\Ideamart\Sender\Broker\ServiceBroker;
use Ideamart\USSD\Ideamart\Sender\Contracts\FormatterInterface;
use Illuminate\Contracts\Foundation\Application;

class Sender {

	use Core;

	protected $app;

	protected $serviceProvider;

	protected $config;

	protected $formatter;

	public function __construct(Application $application,
		ServiceBroker $broker,
		FormatterInterface $formatterInterface
	) {
		$this->app = $application;
		$this->config = $this->app->make('config');
		$this->serviceProvider = $broker;
		$this->formatter = $formatterInterface;
	}

	public function send($product) {
		$product = $this->formatter->resolveJsonStream($product, $this->serviceProvider);
		return $this->sendRequest($product, $this->serviceProvider->server_url);
	}
}
