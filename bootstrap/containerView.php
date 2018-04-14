<?php
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

    $view->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
    ]);
    $view->getEnvironment()->addGlobal('DBController', [
        'userList' => $container->DBController->getUserList(),
        'getCoursesList' => $container->DBController->getCoursesList(),
    ]);

    $view->getEnvironment()->addGlobal('flash', $container->flash);

    return $view;
};
