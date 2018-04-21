<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DBController extends Controller
{
    public function getUserList()
    {
        $users = array('users' => $this->db2->select('select id,name,role,email,phone,added_by from users where role >= "2";'));
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
        $courses = array('courses' => $this->db2->select('select id,name,description,start_date,end_date,added_by from courses', [1]));
        $parsedCourses = array();
        foreach ($courses as $key => $value) {
            foreach ($value as $subkey => $subvalue) {
                $parsedCourses[$subkey] = $subvalue;
            }
        }
        return $parsedCourses;
    }
    public function getSalesList()
    {
        $users = array('sales' => $this->db2->select('select id,name,role,email,phone,added_by from users where role = "1"'));
        $parsedUsers = array();
        foreach ($users as $key => $value) {
            foreach ($value as $subkey => $subvalue) {
                $parsedUsers[$subkey] = $subvalue;
            }
        }
        return $parsedUsers;
    }
    public function getStudentsList()
    {
        $users = array('students' => $this->db2->select('select id,name,email,phone,added_by from students'));
        $parsedUsers = array();
        foreach ($users as $key => $value) {
            foreach ($value as $subkey => $subvalue) {
                $parsedUsers[$subkey] = $subvalue;
            }
        }
        return $parsedUsers;
    }
    public function showDetails($request, $response, $args)
    {
        $id = $args['id'];
        $table = $args['elType'];
        switch ($table) {
            case 'courses':
                $output = json_encode($this->db2->select("select id,name,description,start_date,end_date,added_by from $table where id =$id"));
                break;
            case 'users':
                $output = json_encode($this->db2->select("select id,name,role,email,phone,added_by from $table where id =$id"));
                break;
            case 'students':
                $output = json_encode($this->db2->select("select id,name,email,phone,added_by from $table where id =$id"));
                break;
        }
        return $response->getBody()->write($output);
    }
}
