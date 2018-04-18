<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DBController extends Controller
{
    public function getUserList()
    {
        $users = array('users' => $this->db2->select('select id,name from users'));
        $parsedUsers = array();
        foreach ($users as $key => $value) {
            foreach ($value as $subkey => $subvalue) {
                $parsedUsers[$subkey] = $subvalue;
            }
        }
        return $parsedUsers;
    }
    public function getCoursesList()
    {
        $courses = array('courses' => $this->db2->select('select id,name,description,start_date,end_date,created_by from courses', [1]));
        $parsedCourses = array();
        foreach ($courses as $key => $value) {
            //var_dump($value);
            foreach ($value as $subkey => $subvalue) {
                // var_dump($subkey, $subvalue);
                $parsedCourses[$subkey] = $subvalue;
            }
            // var_dump($parsedCourses);
            // die();
        }
        return $parsedCourses;
    }
}
