<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Respect\Validation\Validator as v;

class UserUpdate extends Controller
{
    public function getUserSignUp($request, $response)
    {
        var_dump($request->getParam('data'));
        die();
        return $this->view->render($response, 'auth/user_update.twig');
    }

    public function populateForm($request, $response)
    {
        $id = $request->getParam('id');
        $table = $request->getParam('type');
        if ($table == "users") {
            $userList = array('user' => $this->db2->select("SELECT id,name,email,phone,role FROM $table WHERE id =$id"));
        }
        if ($table == "students") {
            $userList = array('student' => $this->db2->select("SELECT id,name,email,phone FROM $table WHERE id =$id"));
        }
        return $this->view->render($response, 'auth/user_update.twig', $userList);
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

    public function ChangeImage($request, $response)
    {
        $id = $request->getParam('id');
        $table = $request->getParam('type');
        /////////
        //get uploads
        $uploadedFiles = $request->getUploadedFiles();
        // get image from uploads
        $uploadedFile = $uploadedFiles['image'];
        //image validate chunk end
        $this->ImageValidator->failed($uploadedFile);

        if ($this->ImageValidator->failed($uploadedFile)) {
            $this->flash->addMessage('imageUpdateError', '');
            $args = ['id' => $id, 'type' => $table];
            return $response->withRedirect($this->router->pathFor('auth.user_update', [], $args));
        }
        //Get the PDO object to bind the id as name to image
        $pdo = $this->db2->getPdo();
        $statement = $pdo->prepare("SELECT id,name FROM $table WHERE id= :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();
        $id = $result["id"];
        $name = $result["name"];
        //pass user name and id to image storage function
        if ($table == "students") {
            $this->ImageValidator->moveUploadedFile($this->container->upload_directory_students, $uploadedFile, $id);
        }
        if ($table == "users") {
            $this->ImageValidator->moveUploadedFile($this->container->upload_directory_users, $uploadedFile, $id);
        }
        $this->flash->addMessage('info', 'Image changed for ' . $name . ' successful!');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
