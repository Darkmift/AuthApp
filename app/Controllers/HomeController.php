<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        $courseList = array('courseList' => $this->DBController->getCoursesList());
        $userList = array('userList' => $this->DBController->getUserList());
        $lists = array('lists' => array($courseList, $userList));
        // return $this->view->render($response, 'home.twig');
        return $this->view->render($response, 'home.twig', $lists);
    }
}
