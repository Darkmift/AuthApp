<?php
namespace App\Controllers;

// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        // $this->flash->addMessage('error', 'Test flash message-Error');
        // $this->flash->addMessage('info', 'Test flash message-info');
        return $this->view->render($response, 'home.twig');
    }
}
