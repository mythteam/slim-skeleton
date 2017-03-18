<?php

namespace App\Http\Controllers;

use App\Base\Controller;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Response;
use SplDoublyLinkedList;

/**
 * Base Controller.
 *
 * @package App\Controllers
 */
class IndexController extends Controller
{
    public function indexAction(ServerRequestInterface $request, Response $response): Response
    {
        return $this->render('index.php', []);
    }
}
