<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;
$app->get('/home', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});
$app->group('', function () {
    //signup
    $this->get('/auth/signup', 'SignUp:getSignUp')->setName('auth.signup');
    $this->post('/auth/signup', 'SignUp:postSignUp');

    //signin
    $this->get('/auth/signin', 'SignIn:getSignIn')->setName('auth.signin');
    $this->post('/auth/signin', 'SignIn:postSignin');

})->add(new GuestMiddleware($container));

$app->group('', function () {
    //calls controller from app.php $container['HomeController']
    $this->get('/', 'HomeController:index')->setName('home');
    $this->post('/btns', 'HomeController:operationBtns')->setName('home.Display');

    //user creation
    $this->get('/auth/user_create', 'userCreate:getSignUp')->setName('auth.user.create');
    $this->post('/auth/user_create', 'userCreate:postSignUp');

    //course creation
    $this->get('/auth/course_create', 'CourseCreate:getCourseCreate')->setName('auth.course_create');
    $this->post('/auth/course_create', 'CourseCreate:postCourseCreate');

    //signout
    $this->get('/auth/signout', 'SignOut:getSignOut')->setName('auth.signout');

    //password change
    $this->get('/auth/password/change', 'PasswordChange:getChangedPassword')->setName('auth.password.change');
    $this->post('/auth/password/change', 'PasswordChange:postChangedPassword');
})->add(new AuthMiddleware($container));
