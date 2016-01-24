<?php

namespace Ideamart\USSD\Ideamart\Maker;

use Illuminate\Contracts\Foundation\Application;
use Inqurtime\System\Session\Contracts\SessionHandler;

class Parser {
    protected $menu;
    protected $config;
    protected $session;
    public function __construct(Application $application, SessionHandler $sessionHandler) {
        $this->config = $application->make('config');
        $this->session = $sessionHandler;
    }
    /**
     * @param string $value
     */
    public function setParse($value = "master_menu") {
        $this->config->set('system.' . $this->session->getAppId() . '.ussd.interface', $value);
        app('log')->info($this->session->getAppId());
    }
    public function getMenu() {
        return $menu;
    }
    private function buildOptions($menu_address) {
        $menu = $this->getConfig($menu_address);
        $options = [];
        foreach ($menu as $menu_key => $menu_item) {
            $options['titles'][$menu_key] = $menu_item['title'];
        }
        return $options;
    }
    private function getConfig($value) {
        return $this->config->get($value);
    }
    public function makeMenu(SessionHandler $session) {
        //$menu = $this->getConfig($session->getMenuPath());
        $message = '';
        $message .= $menu['message'] . "\n";

        foreach ($menu['options'] as $key => $option) {
            $message .= $key . '.' . $option['title'] . "\n";
        }
        return $message;
    }
}
