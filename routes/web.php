<?php
/** @var \Slim\App $app */

$app->get('/', '\App\Http\Controllers\IndexController:indexAction');//->add(\App\Middleware\Auth::class);
