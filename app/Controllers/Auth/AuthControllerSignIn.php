<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;

class AuthControllerSignIn extends Controller
{

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth\signin.twig');
    }

    public function postSignIn($request, $response)
    {
        return $this->view->render($response, 'auth\signin.twig');
    }

}
