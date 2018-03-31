<?php

// $app->get('/home', function ($request, $response) {
//     return $this->view->render($response,'home.twig');
// });

//calls controller from app.php $container['HomeController'] 
$app->get('/', 'HomeController:index')->setName('home');

$app->get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app->post('/auth/signup', 'AuthController:postSignUp');