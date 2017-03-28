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
    ],
    'twig' => [
        'debug' => APP_DEBUG,
        'cache' => BASE_PATH . '/storage/views',
    ],
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'database',
        'username' => 'root',
        'password' => 'password',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],
];

return new \App\Base\Container($settings);
