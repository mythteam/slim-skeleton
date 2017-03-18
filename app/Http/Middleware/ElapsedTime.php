<?php

namespace App\Http\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class ElapsedTime
{
    public function __invoke(Request $request, Response $response, $next)
    {
        /** @var Response $response */
        $response = $next($request, $response);
        
        $elapsedTime = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
        
        if ($request->isXhr()) {
            $response = $response->withHeader('X-Time', $elapsedTime);
        } else {
            $elapsedTime = floor($elapsedTime * 1000);
            $response = $response->write('<!--' . $elapsedTime . 'ms-->');
        }
        
        return $response;
    }
}
