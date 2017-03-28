<?php
/** @var \Slim\App $app */

$app->get('/', '\App\Http\Controllers\IndexController:indexAction');//->add(\App\Middleware\Auth::class);
$app->post('/login', '\App\Http\Controllers\IndexController:loginAction');
$app->get('/rest', '\App\Http\Controllers\IndexController:restAction');
