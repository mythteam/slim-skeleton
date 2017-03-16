<?php
//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);
define('BASE_PATH', dirname(__DIR__));

require PUBLIC_PATH . '/../vendor/autoload.php';

$settings = require __DIR__ . '/../config/settings.php';
$app = new Slim\App($settings);

// Bootstrap
require PUBLIC_PATH . '/../app/bootstrap.php';

//Register middleware
require BASE_PATH . '/config/middleware.php';

// Init slim routes
require BASE_PATH . '/config/routes.php';

$app->run();
