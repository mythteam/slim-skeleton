<?php

namespace App\Http\Controllers;

use App\Base\Controller;
use App\Models\User;
use App\Transformers\UserTransformer;
use League\Fractal\Resource\Item;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Base Controller.
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

    /**
     * ~~~
     * /rest
     * /rest?expand=posts,posts.thumbnails
     * /rest?expand=posts
     * ~~~.
     *
     * @return Response
     */
    public function restAction()
    {
        $user = new Item(new User(), new UserTransformer(), 'data');

        return $this->renderResource($user);
    }
}
