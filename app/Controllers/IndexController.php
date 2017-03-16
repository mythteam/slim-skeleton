<?php

namespace App\Controllers;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

/**
 * Base Controller.
 *
 * @package App\Controllers
 */
class IndexController
{
    /**
     * @var \Slim\Container
     */
    protected $container;
    
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function indexAction(ServerRequestInterface $request, Response $response)
    {
        $response->write('aaa');
        sleep(1);
        
        return $response;
    }
}
