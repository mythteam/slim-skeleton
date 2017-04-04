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
        foreach ($options as $conn => $option) {
            $manager->addConnection($option, $conn);
        }
        
        $manager->setAsGlobal();
        $manager->bootEloquent();
        
        $container['db'] = $manager;
    }
}
