<?php

namespace App\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

class Auth
{
    public function __invoke(ServerRequestInterface $request, Response $response, $next)
    {
        if (true) {
            $response = $response->write('www.baidu.com');
        }

        return $next($request, $response);
    }
}
