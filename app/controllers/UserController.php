<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;

class UserController extends Controller
{

    public function signupAction()
    {
    if(!empty($_POST))
    {
        $dataAuth = $_POST;
        $user = new User();
        $user->load($dataAuth);
        if(!$user->validate($user->attributesAuth))
        {
            $user->getErrors();
            redirect();
        }
        die;
    }
    }

    public function loginAction()
    {

    }

    public function logoutAction()
    {

    }

}