<?php

namespace Joomtriggers\Ideamart\Contracts;

interface ConfigurationInterface {
    public function configure(array $config);

    public function getConfigurations();

    public function getConfiguration($key);

    public function setConfiguration($key,$value);

    public function getSecret();

    public function getApplication();

    public function getServer();
}

