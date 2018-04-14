<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DBController extends Controller
{
    public function getUserList()
    {
        $users = $this->db2->select('select id,name from users', [1]);
        $users;

        return $users;
    }
    public function getCoursesList()
    {
        $courses = $this->db2->select('select id,name,description,start_date,end_date from courses', [1]);
        $courses;

        return $courses;
    }
}
