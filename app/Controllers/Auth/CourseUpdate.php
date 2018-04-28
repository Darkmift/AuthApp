<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\Course;
use Respect\Validation\Validator as v;

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
        $validation = $this->validator->validate($request, [
            'name' => v::notEmpty(),
            'description' => v::notEmpty()->length(40, 2000),
            'start_date' => v::noWhitespace()->notEmpty()->date('Y-m-d'),
            'end_date' => v::noWhitespace()->notEmpty()->date('Y-m-d'),
        ]);
        /////////

        if ($validation->failed()) {
            $this->flash->addMessage('courseError', '');
            $args = ['id' => $id, 'type' => $table];
            return $response->withRedirect($this->router->pathFor('auth.course_update', [], $args));
        }
        //if form valid create user
        $user = Course::where('id', $id)
            ->update([
                'name' => $request->getParam('name'),
                'description' => $request->getParam('description'),
                'start_date' => $request->getParam('start_date'),
                'end_date' => $request->getParam('end_date'),
            ]);

        $this->flash->addMessage('info', 'Course creation successful!');
        //redirect user on succesful registration
        return $response->withRedirect($this->router->pathFor('home'));
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
            return $response->withRedirect($this->router->pathFor('auth.course_update', [], $args));
        }
        //Get the PDO object to bind the id as name to image
        $pdo = $this->db2->getPdo();
        $statement = $pdo->prepare("SELECT id,name FROM $table WHERE id= :id");
        $statement->execute(['id' => $id]);
        $result = $statement->fetch();
        $id = $result["id"];
        $name = $result["name"];
        //pass user name and id to image storage function
        if ($table == "courses") {
            $this->ImageValidator->moveUploadedFile($this->container->courseImage_upload_directory, $uploadedFile, $id);
        }
        $this->flash->addMessage('info', 'Image changed for ' . $name . ' successful!');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
