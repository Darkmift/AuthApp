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
      
        //if login fails
        if (!$auth) {
            $this->flash->addMessage('error', 'login failed,please try again');

            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));
    }

}
