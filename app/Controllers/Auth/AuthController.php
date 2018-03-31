<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth\signup.twig');
    }

    public function postSignUp($request, $response)
    {
        $user=User::create([
            'name' => $request->getParam('name'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'),PASSWORD_DEFAULT),
        ]);
       // var_dump($request->getParam('name'), $request->getParam('email'), $request->getParam('password'));
       return $response->withRedirect($this->router->pathFor('home'));
    }
}
