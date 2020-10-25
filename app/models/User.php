<?php


namespace App\Models;


use Core\Model;


class User extends Model
{
    public $table = 'users';

    public $attributesSignup = [
      'login' => '',
      'password' => '',
      'email' => '',
      'name' => ''
    ];

    public $rulesSignup = [
      'required' => [
          ['login'],
          ['password'],
          ['email'],
          ['name']
      ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ]

    ];

    public function checkUser()
    {
        $data = $this->createComand()->select()->from('users')->where(['login' => $this->attributesSignup['login'], 'email' => $this->attributesSignup['email']])->limit('1')->findOne();
        $user = call_user_func_array('array_merge', $data);
        if($user)
        {
            if($user['login'] == $this->attributesSignup['login'])
            {
                $this->errorsSignup['checkUser'][] = "Этот логин занят";
            }
            if($user['email'] == $this->attributesSignup['email'])
            {
                $this->errorsSignup['checkUser'][] = "Такой Email уже зарегестрирован";
            }
            return false;
        }
        return true;
    }

    public function login()
    {
        $login = !empty(rtrim($_POST['login'])) ? rtrim($_POST['login']) : null;
        $password = !empty(rtrim($_POST['password'])) ? rtrim($_POST['password']) : null;
        if($login && $password)
        {
            $user = $this->createComand()->select()->from('users')->where(['login'=>$_POST['login']])->limit('1')->findOne();
            if($user)
            {
                if(password_verify($password, $user['password']))
                {
                    foreach ($user as $key => $value)
                    {
                        if($key != 'password') $_SESSION['user'][$key] = $value;
                    }
                    return true;
                }
                return false;
            }
        }
        return false;
    }

}