<?php
namespace App\Controllers;

class HomeController extends Controller
{
    public function index($request, $response)
    {
        // $courseList = array('courseList' => $this->DBController->getCoursesList());
        // $userList = array('userList' => $this->DBController->getUserList());
        // $lists = array('lists' => array($courseList, $userList));
        // return $this->view->render($response, 'home.twig', $lists);
        return $this->view->render($response, 'home.twig');
    }

    public function operationBtns($request, $response)
    {
        //init array
        $allPostPutVars = array();
        $count = 1;
        foreach ($request->getParsedBody() as $key => $param) {
            $allPostPutVars[$count] = $param;
            $count++;
        }
        //set name of input
        $btn = $allPostPutVars[3];
        //return relevant
        switch ($btn) {
            case 'Admins':
                $userList = array('userList' => $this->DBController->getUserList());
                return $this->view->render($response, 'home.twig', $userList);
                break;
            case 'Sales':
                $userList = array('userList' => $this->DBController->getSalesList());
                return $this->view->render($response, 'home.twig', $userList);
                break;
            case 'Students':
                $userList = array('userList' => $this->DBController->getStudentsList());
                return $this->view->render($response, 'home.twig', $userList);
                break;
            case 'Courses':
                $courseList = array('courseList' => $this->DBController->getCoursesList());
                return $this->view->render($response, 'home.twig', $courseList);
                die('Courses');
                break;
        }
    }
}
