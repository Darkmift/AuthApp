<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;
class AuthController extends Controller
{
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth\signup.twig');
    }

    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request,[
            'email'=>v::noWhitespace()->notEmpty(),
            'name'=>v::notEmpty()->alpha(),
            'password'=>v::noWhitespace()->notEmpty(),
        ]);

        $user=User::create([
            'name' => $request->getParam('name'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'),PASSWORD_DEFAULT),
        ]);
       // var_dump($request->getParam('name'), $request->getParam('email'), $request->getParam('password'));
       return $response->withRedirect($this->router->pathFor('home'));
    }
}
