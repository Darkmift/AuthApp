<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;

// use App\Models\Course;
// use Respect\Validation\Validator as v;

class CourseUpdate extends Controller
{
    public function getCourseCreate($request, $response)
    {
        var_dump($request->getParam('data'));
        die();
        return $this->view->render($response, 'auth\course_update.twig');
    }

    public function postCourseCreate($request, $response)
    {
        return $this->view->render($response, 'auth\course_update.twig');
    }
}
