<?php

$settings = [
    'settings' => [
        'displayErrorDetails' => true,
        //'determineRouteBeforeAppMiddleware' => true,
    ],
    'providers' => [
        \App\Providers\TemplateProvider::class,
    ],
];

return new \App\Base\Container($settings);
