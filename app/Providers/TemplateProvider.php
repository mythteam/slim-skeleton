<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

class TemplateProvider implements ServiceProviderInterface
{
    /**
     * @inheritdoc
     */
    public function register(Container $c)
    {
        $view = new Twig(BASE_PATH . '/resources/views', [
            //'cache' => 'path/to/cache'
        ]);
        
        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
        $view->addExtension(new TwigExtension($c['router'], $basePath));
        
        $c['renderer'] = $view;
    }
}
