<?php

/** @var \Slim\App $app */
$app->add(new \App\Http\Middleware\Test());
$app->add(new \App\Http\Middleware\ElapsedTime());
