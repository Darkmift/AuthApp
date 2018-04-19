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

$container['SignUp'] = function ($container) {
    return new App\Controllers\Auth\SignUp($container);
};

$container['SignIn'] = function ($container) {
    return new App\Controllers\Auth\SignIn($container);
};

$container['CourseCreate'] = function ($container) {
    return new App\Controllers\Auth\CourseCreate($container);
};

$container['userCreate'] = function ($container) {
    return new App\Controllers\Auth\userCreate($container);
};

$container['SignOut'] = function ($container) {
    return new App\Controllers\Auth\SignOut($container);
};

$container['validator'] = function ($container) {
    return new App\Validation\Validator;
};

$container['ImageValidator'] = function ($container) {
    return new App\Validation\ImageValidator($container);
};

$container['PasswordChange'] = function ($container) {
    return new App\Controllers\Auth\PasswordChange($container);
};

//csrf import1/2
$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};

$container['DBController'] = function ($container) {
    return new App\Controllers\DBController($container);
};

//upload dir for images
$container['upload_directory_users'] = __DIR__.'/../public/images/users';

//upload dir for images of courses
$container['courseImage_upload_directory'] = __DIR__.'/../public/images/courses';

