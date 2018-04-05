<?php

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
        'charset' => $settings['db']['charset'],
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
