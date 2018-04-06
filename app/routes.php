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
$app->get('/auth/signin', 'AuthControllerSignIn:getSignIn')->setName('auth.signin');
$app->post('/auth/signin', 'AuthControllerSignIn:postSignin');

//signout
$app->get('/auth/signout', 'AuthControllerSignOut:getSignOut')->setName('auth.signout');