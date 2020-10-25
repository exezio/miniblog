<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;

class UserController extends Controller
{

    public function signupAction()
    {
        if (!empty($_POST)) {
            $dataAuth = $_POST;
            $user = new User();
            $user->loadAttributesSignup($dataAuth);
            if (!$user->validateSignup($user->attributesSignup) || !$user->checkUser()) {
                $user->getErrorsSignup();
                $_SESSION['form_data'] = $dataAuth;
                redirect();
            }
            $user->attributesSignup['password'] = password_hash($user->attributesSignup['password'], PASSWORD_DEFAULT);
            if ($user->saveAttributesSignup()) {
                $_SESSION['success'] = 'Вы успешно зарегестрированны';
            } else {
                $_SESSION['error'] = 'Ошибка регистрации';
            }
            redirect();
            die;
        }
    }

    public function loginAction()
    {
        if(!empty($_POST))
        {
            $user = new User();
            if($user->login())
            {
            $_SESSION['success'] = 'Вы успешно авторизованы';
            }
            else
            {
               $_SESSION['error'] = 'Логин или пароль введены неверно';
            }
            redirect();
        }
    }

    public function logoutAction()
    {

    }

}