<?php

// Get container
$container = $app->getContainer();

//temp setup for auth check--belongs below
$container['auth'] = function ($container) {
    return new \App\Auth\Auth;
};

//flash pack plugin
$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages;
};

//view container
require __DIR__.'/containerView.php';

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};

$container['AuthControllerSignUp'] = function ($container) {
    return new App\Controllers\Auth\AuthControllerSignUp($container);
};

$container['AuthControllerSignIn'] = function ($container) {
    return new App\Controllers\Auth\AuthControllerSignIn($container);
};

$container['AuthControllerSignOut'] = function ($container) {
    return new App\Controllers\Auth\AuthControllerSignOut($container);
};

$container['validator'] = function ($container) {
    return new App\Validation\Validator;
};

//csrf import1/2
$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};

//upload dir for images
$container['upload_directory'] = __DIR__ . '/../resources/images';
