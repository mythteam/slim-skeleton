<?php

namespace App\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

class Test
{
    public function __invoke(ServerRequestInterface $request, Response $response, $next)
    {
        //sleep(1);
        $response = $response->withHeader('X-Middle', __CLASS__);
        return $next($request, $response);
    }
}
