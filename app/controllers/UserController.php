<?php


namespace App\Controllers;


use App\Models\Auth;
use App\Models\Registration;
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
            $registration = new Registration();
            $registration->loadAttributes($dataAuth);
            if($registration->userRegistration())
            {
                header('Refresh: 2; url=/user/login');
            }else{
                header('Location: /user/signup');
                exit();
            }
        }
    }

    public function loginAction()
    {
        if(!empty($_POST))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $remember = $_POST['remember'];
            $authorization = new Auth();
            $authorization->login($login, $password, $remember);

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