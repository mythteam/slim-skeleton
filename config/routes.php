<?php

$app->get('/', '\App\Controllers\IndexController:indexAction')->add(\App\Middleware\Auth::class);
