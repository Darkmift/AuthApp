<?php

// Get container
$container = $app->getContainer();

//Register Twig View helper
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false/**'path/to/cache'**/,
    ]);

    // Instantiate and add Slim specific extension
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};

$container['AuthControllerSignUp'] = function ($container) {
    return new App\Controllers\Auth\AuthControllerSignUp($container);
};

$container['AuthControllerSignIn'] = function ($container) {
    return new App\Controllers\Auth\AuthControllerSignIn($container);
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

$container['auth'] = function ($container) {
    return new \App\Auth\Auth;
};