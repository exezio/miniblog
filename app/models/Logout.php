<?php


namespace App\Models;


use Core\Libs\Registr;

class Logout
{

    public function logout()
    {
        setcookie('user_token', '', time()-3600, '/');
        session_unset();
        $token = Registr::$container;
        $this->createComand()->delete()->from($this->sessionTable)->where(['token'=>$token])->query();

    }

}