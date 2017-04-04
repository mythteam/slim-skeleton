<?php

$settings = [
    'settings' => [
        'name' => 'Hello VueJS',
        'displayErrorDetails' => true,
        //'determineRouteBeforeAppMiddleware' => true,
    ],
    'providers' => [
        \App\Providers\TemplateProvider::class,
        \App\Providers\FractalProvider::class,
        \App\Providers\DatabaseProvider::class,
    ],
    'twig' => [
        'debug' => APP_DEBUG,
        'cache' => BASE_PATH . '/storage/views',
    ],
    'db' => [
        'default' => [
            'driver' => 'mysql',
            'host' => '192.168.10.12',
            'database' => 'slim_db',
            'username' => 'vagrant',
            'password' => 'vagrant',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ],
];

return new \App\Base\Container($settings);
