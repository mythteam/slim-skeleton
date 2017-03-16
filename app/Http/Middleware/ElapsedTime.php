<?php

namespace App\Http\Middleware;

use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;

class ElapsedTime
{
    public function __invoke(ServerRequestInterface $request, Response $response, $next)
    {
        $start = microtime(true);
        
        /** @var Response $response */
        $response = $next($request, $response);
        
        $elapsedTime = microtime(true) - $start;
        $response = $response->withHeader('X-Time', $elapsedTime);
        $response = $response->write('<!--' . $elapsedTime . '-->');
        
        return $response;
    }
}
