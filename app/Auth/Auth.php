<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
    public function attempt($email, $password)
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

        //if password verify faiiled
        return false;

    }
}
