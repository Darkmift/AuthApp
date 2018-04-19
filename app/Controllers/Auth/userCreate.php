<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;

class userCreate extends Controller
{
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth/user_create.twig');
    }

    public function postSignUp($request, $response)
    {
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
