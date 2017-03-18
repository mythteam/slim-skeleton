<?php

namespace App\Providers;

use Illuminate\Database\Capsule\Manager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DatabaseProvider implements ServiceProviderInterface
{
    
    /**
     * @inheritdoc
     */
    public function register(Container $container)
    {
        if (!isset($container['db'])) {
            return;
        }
        $options = $container['db'];
        
        $manager = new Manager();
        $manager->addConnection($options);
        $manager->setAsGlobal();
        
        $container['db'] = $manager;
    }
}
