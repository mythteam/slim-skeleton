<?php

namespace App\Providers;

use App\Fractal\Serializer;
use League\Fractal\Manager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FractalProvider implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $manager = new Manager();
        $manager->setSerializer(new Serializer());

        if (isset($_GET['expand'])) {
            $manager->parseIncludes($_GET['expand']);
        }

        $pimple['fractal'] = $manager;
    }
}
