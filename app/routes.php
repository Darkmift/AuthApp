<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
// $app->get('/home', function ($request, $response) {
//     return $this->view->render($response,'home.twig');
// });
$app->group('', function () {
//signup
    $this->get('/auth/signup', 'AuthControllerSignUp:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup', 'AuthControllerSignUp:postSignUp');

//signin
    $this->get('/auth/signin', 'AuthControllerSignIn:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin', 'AuthControllerSignIn:postSignin');
})->add(new GuestMiddleware($container));

$app->group('', function () {
    //calls controller from app.php $container['HomeController']
    $this->get('/', 'HomeController:index')->setName('home');

    //signout
    $this->get('/auth/signout', 'AuthControllerSignOut:getSignOut')->setName('auth.signout');

    //password change
    $this->get('/auth/password/change', 'PasswordController:getChangedPassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordController:postChangedPassword');
})->add(new AuthMiddleware($container));
