<?php

namespace App\Base;

use Interop\Container\ContainerInterface;
use Slim\Http\Response;

abstract class Controller
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    
    /**
     * @param string $template
     * @param array  $data
     *
     * @return mixed
     */
    public function render($template, $data = []): Response
    {
        $renderer = $this->container->get('renderer');
        
        return $renderer->render($this->container->get('response'), $template, $data);
    }
    
    public function renderJson(array $data, int $code = 0, string $msg = 'OK'): Response
    {
        /** @var Response $response */
        $response = $this->container->get('response');
        
        $data['code'] = $code;
        $data['message'] = $msg;
        
        return $response->withJson($data, 200, JSON_UNESCAPED_UNICODE);
    }
}
