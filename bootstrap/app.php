<?php
use Respect\Validation\Validator as v;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Database\Connection;
use Psr\Container\ContainerInterface as Container;
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
            'password' => 'root12',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
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

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

$container['db2'] = function (Container $container) {
    $settings = $container->get('settings');
    $config = [
        'driver' => 'mysql',
        'host' => $settings['db']['host'],
        'database' => $settings['db']['database'],
        'username' => $settings['db']['username'],
        'password' => $settings['db']['password'],
        'charset'  => $settings['db']['charset'],
        'collation' => $settings['db']['collation'],
        'prefix' => '',
    ];

    $factory = new ConnectionFactory(new \Illuminate\Container\Container());

    return $factory->make($config);
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

$container['HomeController'] = function ($container) {
    return new App\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container) {
    return new App\Controllers\Auth\AuthController($container);
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

//my middlewares
$app->add(new App\Middleware\ValidationErrorsMiddleware($container));
$app->add(new App\Middleware\OldInputMiddleware($container));
$app->add(new App\Middleware\CsrfViewMiddleware($container));

//csrf import2/2
$app->add($container->csrf);

//my custom rules--called by respect---see first lines on top
v::with('App\\Validation\\Rules\\');

require __DIR__ . '/../app/routes.php';
