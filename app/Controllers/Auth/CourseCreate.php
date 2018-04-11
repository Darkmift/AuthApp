<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;

class CourseCreate extends Controller
{
    public function getCourseCreate($request, $response)
    {
        return $this->view->render($response, 'auth\course_create.twig');
    }

    public function postCourseCreate($request, $response)
    {
        $this->flash->addMessage('info', 'Course creation successful!');
        //redirect user on succesful registration
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
