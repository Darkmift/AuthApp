<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
    //if session isset (check=true) return user record ($_SESSION established in attempt() as logging user id)
    public function user()
    {
        if (isset($_SESSION['user'])) {
            return User::find($_SESSION['user']);
        }
        return false;
    }

    //check if session is set
    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function attemptLogin($email, $password)
    {
        //grab user by email
        $user = User::where('email', $email)->first();
        if (!$user) {
            //false if fails
            return false;
        }
        if (password_verify($password, $user->password)) {
            //if true verify password
            //set session if true
            $_SESSION['user'] = $user->id;
            return true;
        }
        //if password verify failed
        return false;
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }
}
