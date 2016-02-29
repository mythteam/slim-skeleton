<?php
//  PUBLIC_PATH
define('PUBLIC_PATH', __DIR__);
//vendor
require PUBLIC_PATH . '/../vendor/autoload.php';
// Bootstrap
require PUBLIC_PATH . '/../app/bootstrap.php';
// Init slim routes
require BASE_PATH . '/config/routes.php';
