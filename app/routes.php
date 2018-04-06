<?php

// $app->get('/home', function ($request, $response) {
//     return $this->view->render($response,'home.twig');
// });

//calls controller from app.php $container['HomeController']
$app->get('/', 'HomeController:index')->setName('home');

//signup
$app->get('/auth/signup', 'AuthControllerSignUp:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthControllerSignUp:postSignUp');

//signin
$app->get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthController:postSignin');