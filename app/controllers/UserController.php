<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;
use function GuzzleHttp\Promise\exception_for;

class UserController extends Controller
{
    private $token = '';

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

    public function checkAction()
    {
        $user = new User();
        $user->logout();
//        header("Location: /");
//        exit();
    }

    public function logoutAction()
    {

    }

    public function LCAction()
    {

    }
}