<?php
namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use Respect\Validation\Validator as v;
use Slim\Http\UploadedFile;

class AuthController extends Controller
{
    private $uploadStatus = true;
    public function getSignUp($request, $response)
    {
        return $this->view->render($response, 'auth\signup.twig');
    }

    public function postSignUp($request, $response)
    {
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->emailAvailable(),
            'name' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        /////////
        //image validate start
        $directory = $this->container->upload_directory;
        $uploadedFiles = $request->getUploadedFiles();
        // handle single input with single file upload
        $uploadedFile = $uploadedFiles['image'];
        //image validate chunk end

        if ($uploadedFile->getSize() == 0) {
            $_SESSION['errors']['image'] = 'Please add image';
            $this->uploadStatus = false;
        } else {
            if ($uploadedFile->getClientMediaType() !== "image/jpeg") {
                $_SESSION['errors']['image'] = '"' . $uploadedFile->getClientFilename() . '" is wrong file format!';
                $this->uploadStatus = false;
            } else {
                if ($uploadedFile->getSize() > 1048576) {
                    $_SESSION['errors']['image'] = '"' . $uploadedFile->getClientFilename() . '" is too large (' . $uploadedFile->getSize() . ')!';
                    $this->uploadStatus = false;
                }
            }
        }
        /////////
        if ($validation->failed() || $this->uploadStatus == false) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
        //if form valid create user
        $user = User::create([
            'name' => $request->getParam('name'),
            'email' => $request->getParam('email'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);
        // Get the PDO object
        $pdo = $this->db2->getPdo();
        $statement = $pdo->prepare("SELECT * FROM users WHERE name= :name");
        $statement->execute(['name' => $request->getParam('name')]);
        $result = $statement->fetch();
        $id = $result['id'];
        //pass user name and id to image storage function
        $this->moveUploadedFile($directory, $uploadedFile, $request->getParam('name'), $id);
        //redirect user on succesful registration
        return $response->withRedirect($this->router->pathFor('home'));
    }

    private function moveUploadedFile($directory, UploadedFile $uploadedFile, $name, $id)
    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = $id . $name;
        // $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }

}
