<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;

// use App\Models\Course;
// use Respect\Validation\Validator as v;

class CourseUpdate extends Controller
{
    public function populateForm($request, $response)
    {
        $id = $request->getParam('id');
        $table = $request->getParam('type');
        if ($table == "courses") {
            $course = array('course' => $this->db2->select("SELECT id,name,description,start_date,end_date FROM $table WHERE id =$id"));
        }
        return $this->view->render($response, 'auth\course_update.twig', $course);
    }

    public function submitForm($request, $response)
    {
        $id = $request->getParam('id');
        $table = $request->getParam('type');
        //respect/validation validator object
        $pw = $request->getParam('password');
        if ($pw) {
            $pwValidation = $this->validator->validate($request, [
                'password' => v::noWhitespace(),
            ]);
        }
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty(),
            'name' => v::notEmpty()->alpha(),
            'phone' => v::notEmpty()->PhoneValid(),
            'role' => v::notEmpty(),
        ]);
/////////
        if ($validation->failed()) {
            $this->flash->addMessage('userCreateError', '');
            $args = ['id' => $id, 'type' => $table];
            return $response->withRedirect($this->router->pathFor('auth.user_update', [], $args));
        }
//if form valid create user
        $role = $request->getParsedBodyParam("role");
        switch ($role) {
            case 'S':
                Student::where('id', $id)
                    ->update([
                        'name' => $request->getParam('name'),
                        'email' => $request->getParam('email'),
                        'phone' => $request->getParam('phone'),
                    ]);
                if ($pw) {
                    Student::where('id', $id)
                        ->update([
                            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
                        ]);
                }
                $this->flash->addMessage('info', 'Update of ' . $request->getParam('name') . ' successful!');
                return $response->withRedirect($this->router->pathFor('home'));
                break;
            case '1';
            case '2':
                echo 'sales/admin';
                User::where('id', $id)
                    ->update([
                        'name' => $request->getParam('name'),
                        'email' => $request->getParam('email'),
                        'phone' => $request->getParam('phone'),
                        'role' => $request->getParam("role"),
                    ]);
                if ($pw) {
                    User::where('id', $id)
                        ->update([
                            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
                        ]);
                }
                $this->flash->addMessage('info', 'Update of ' . $request->getParam('name') . ' successful!');
                return $response->withRedirect($this->router->pathFor('home'));
                break;
            default:
                die('Go away.');
                break;
        }

    }

}
