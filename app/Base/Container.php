<?php

namespace App\Base;

use Pimple\ServiceProviderInterface;
use Slim\Container as SlimContainer;

class Container extends SlimContainer
{
    public function __construct(array $values = [])
    {
        parent::__construct($values);
        
        if (isset($values['providers'])) {
            $this->registerProvider($values['providers']);
        }
    }
    
    /**
     * @param array $providers
     */
    private function registerProvider(array $providers)
    {
        foreach ($providers as $provider) {
            if (is_callable($provider)) {
                call_user_func($provider, $this);
                continue;
            }
            if (is_string($provider)) {
                $provider = new $provider;
            }
            if ($provider instanceof ServiceProviderInterface) {
                $provider->register($this);
            }
        }
    }
}
