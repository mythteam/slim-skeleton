<?php

namespace App\Http\Controllers;

use App\Base\Controller;
use Slim\Http\Request;
use Slim\Http\Response;
use SplDoublyLinkedList;

/**
 * Base Controller.
 *
 * @package App\Controllers
 */
class IndexController extends Controller
{
    public function indexAction(Request $request, Response $response): Response
    {
        return $this->render('index.php', []);
    }
    
    public function loginAction(Request $request, Response $response): Response
    {
        return $this->renderJson([
            'user' => $request->getParsedBody(),
        ]);
    }
}
