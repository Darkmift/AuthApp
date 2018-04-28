<?php

namespace App\Controllers;

use App\Controllers\Controller;

class DBController extends Controller
{
    public function getUserList()
    {
        $users = array('users' => $this->db2->select('SELECT id,name,role,email,phone FROM users where role >= "2" AND is_active="1";'));
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
        $courses = array('courses' => $this->db2->select('SELECT id,name,description,start_date,end_date FROM courses WHERE is_active="1"', [1]));
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
        $users = array('sales' => $this->db2->select('SELECT id,name,role,email,phone FROM users where role = "1" AND is_active="1"'));
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
        $users = array('students' => $this->db2->select('SELECT id,name,email,phone FROM students WHERE is_active="1"'));
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
        $output = "";
        switch ($table) {
            case 'courses':
                $output = $this->db2->select("SELECT id,name,description,start_date,end_date FROM $table WHERE id =$id");
                break;
            case 'users':
                $output = $this->db2->select("SELECT id,name,role,email,phone FROM $table WHERE id =$id");
                break;
            case 'students':
                $output = $this->db2->select("SELECT id,name,email,phone FROM $table WHERE id =$id");
                break;
        }
        array_push($output, array("logged" => $this->auth->user()->id));
        return $response->getBody()->write(json_encode($output));
    }

    public function updateEntry($request, $response, $args)
    {
        $id = $request->getParam('id');
        $table = $request->getParam('type');
        $action = $request->getParam('action');
        $tester = "";
        switch ($action) {
            case 'update':
                $tester = "update!!";
                break;
            case 'del':
                $tester = "delete!!";
                $output = json_encode($this->db2->update("UPDATE $table SET `is_active`='0' WHERE id=$id"));
                break;
        }
        $derp = array($id, $table, $action, $tester);
        return $response->getBody()->write(json_encode($derp), $output);
    }
}
