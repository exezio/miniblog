<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;

class UserController extends Controller
{

    public function signupAction()
    {
        if (!empty($_POST))
        {
            $dataAuth = $_POST;
            $user = new User();
            $user->loadAttributes($dataAuth);
            $user->userRegistration();
        }
    }

    public function loginAction()
    {
        if(!empty($_POST))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];
            $user = new User();
            $user->login($login, $password, $remember);
        }
    }

    public function logoutAction()
    {

    }

    public function LCAction()
    {

    }
}