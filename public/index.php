<?php

//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);
define('BASE_PATH', dirname(__DIR__));
define('APP_ENV', 'develop');
define('APP_DEBUG', true);

require PUBLIC_PATH.'/../vendor/autoload.php';

$settings = require __DIR__.'/../config/settings.php';
$app = new Slim\App($settings);

//Register middleware
require BASE_PATH.'/config/middleware.php';

// Init slim routes
foreach (glob(BASE_PATH.'/routes/*.php') as $file) {
    require $file;
}

$app->run();
