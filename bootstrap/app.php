<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

// $user = new \App\models\User;
// var_dump($user);
// die();

$app = new \Slim\app([
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'codecourse',
            'username' => 'root',
            'password' => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
         ]
    ],

]);

// Get container
$container = $app->getContainer();

//set illuminate capsule
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
    return $capsule;
};


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

// $container['view'] = function ($container) {
//     $view = new \Slim\Views\Twig('../resources/views', [
//         'cache' => false,
//     ]);

//     // Instantiate and add Slim specific extension
//     $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
//     $view->addExtension(new Slim\Views\TwigExtension(
//         $container->get('router'), $basePath));

//     return $view;
// };

$container['HomeController'] = function($container){
    return new App\Controllers\HomeController($container);
};

$container['AuthController'] = function($container){
    return new App\Controllers\Auth\AuthController($container);
};

$container['validator'] = function($container){
    return new App\Validation\Validator;
};

$app->add(new App\Middleware\ValidationErrorsMiddleware($container));

require __DIR__ . '/../app/routes.php';
