<?php

namespace App\Base;

use Slim\Container;

abstract class Controller
{
    /**
     * @var Container
     */
    protected $container;
    
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    
    public function render($template, $data = [])
    {
        /** @var \Slim\Http\Response $response */
        $response = $this->container->get('response');
        
        $settings = $this->container->get('settings');
        $response->getBody()->write(print_r($settings, true));
        
        return $response;
    }
}
