<?php

namespace Joomtriggers\Ideamart\LBS;

use Joomtriggers\Ideamart\Contracts\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    protected $configuration = [
        "SERVER_URL"         => "http://localhost:7000/lbs/locate",
        "serviceType"        => "IMMEDIATE",
        "responseTime"       => "NO_DELAY",
        "freshness"          => "HIGH",
        "horizontalAccuracy" => "1500"
    ];

    public function configure(array $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getConfigurations()
    {
        return $this->configuration;
    }

    public function setConfiguration($key, $value)
    {
        $this->configuration[$key] = $value;
    }

    public function getConfiguration($key)
    {
        return $this->configuration[$key];
    }

    public function getServer()
    {
        return $this->configuration['SERVER_URL'];
    }

    public function getApplication()
    {
        return $this->configuration['APP_ID'];
    }

    public function getSecret()
    {
        return $this->configuration['APP_SECRET'];
    }
}