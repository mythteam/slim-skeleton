<?php

namespace App\Base;

use Interop\Container\ContainerInterface;

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
     * @param array $data
     *
     * @return mixed
     */
    public function render($template, $data = [])
    {
        $renderer = $this->container->get('renderer');
        
        return $renderer->render($this->container->get('response'), $template, $data);
    }
}
