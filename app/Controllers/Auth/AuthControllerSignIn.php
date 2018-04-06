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
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );
        //Test Login one
        // tlogin1@test.ts
        // Tester1
        // var_dump($auth);
        // die();

        //if login fails
        if (!$auth) {
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));
    }

}
