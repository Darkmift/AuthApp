<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;

class AuthControllerSignUp extends Controller
{
    private $uploadStatus = true;
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth\signup.twig');
    }

    public function postSignUp($request, $response)
    {
        //respect/validation validator object
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
            'name' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
            // 'image' => v::mimetype('image/png')->validate($request->getUploadedFiles())
        ]);

        /////////
        //get uploads
        $uploadedFiles = $request->getUploadedFiles();
        // get image from uploads
        $uploadedFile = $uploadedFiles['image'];
        //image validate chunk end
        $this->ImageValidator->failed($uploadedFile);

<<<<<<< HEAD
        if ($validation->failed() || $this->ImageValidator->failed($uploadedFile)) {
=======
        if ($uploadedFile->getSize() == 0) {
            $_SESSION['errors']['image'] = 'Please add image';
            $this->uploadStatus = false;
        } else {
            if (
                //todo--add more image types.
                $uploadedFile->getClientMediaType() == "image/jpeg" /*||
                $uploadedFile->getClientMediaType() == "image/png"*/
            ) {
                if ($uploadedFile->getSize() > 1048576) {
                    $_SESSION['errors']['image'] = '"' . $uploadedFile->getClientFilename() . '" is too large (' . $uploadedFile->getSize() . ')!';
                    $this->uploadStatus = false;
                }
            } else {
                $_SESSION['errors']['image'] = '"' . $uploadedFile->getClientFilename() . '" is wrong file format!(' . $uploadedFile->getClientMediaType() . ')';
                $this->uploadStatus = false;
            }
        }
        /////////
        if ($validation->failed() || $this->uploadStatus == false) {
>>>>>>> 01f8b72cfa6c53c81f124c6dd4eab6e9c5b8764e
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
        //authcontrollersignup chunk 1 sent to graveyard

        //if form valid create user
        $user = User::create([
            'name' => $request->getParam('name'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);
        //Get the PDO object to bind the id as name to image
        $pdo = $this->db2->getPdo();
        $statement = $pdo->prepare("SELECT * FROM users WHERE name= :name");
        $statement->execute(['name' => $request->getParam('name')]);
        $result = $statement->fetch();
        $id = $result['id'];
        //pass user name and id to image storage function
<<<<<<< HEAD
        $this->ImageValidator->moveUploadedFile($this->container->upload_directory, $uploadedFile, $id);
=======
        $this->moveUploadedFile($directory, $uploadedFile, $id);
>>>>>>> 01f8b72cfa6c53c81f124c6dd4eab6e9c5b8764e

        $this->flash->addMessage('info', 'Registration successful!');

        //create session for new registered user so he may be redirected automatically to home.twig
        $this->auth->attempt($user->email, $request->getParam('password'));

        //redirect user on succesful registration
        return $response->withRedirect($this->router->pathFor('home'));
    }

    // private function moveUploadedFile($directory, UploadedFile $uploadedFile, $id)
    // {
    //     $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    //     $basename = $id;
    //     // $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    //     $filename = sprintf('%s.%0.8s', $basename, $extension);

    //     $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

    //     return $filename;
    // }

}
