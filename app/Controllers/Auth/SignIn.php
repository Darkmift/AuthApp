<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class SignIn extends Controller
{

    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth\signin.twig');
    }

    public function postSignIn($request, $response)
    {
        //respect/validation validator object
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->failed()) {
            $this->flash->addMessage('signinError', '');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        //if login fails
        if (!$auth) {
            $this->flash->addMessage('error', '');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }
        return $response->withRedirect($this->router->pathFor('home'));
    }

}
