<?php


namespace App\Models;


use Core\Model;


class User extends Model
{
    protected $table = 'users';
    protected $errorsSignup = [];
    protected $attributesSignup = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ];

    protected $rulesSignup = [
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


    public function userRegistration()
    {
        if (!$this->validateSignup() || !$this->checkUser()) {
            $_SESSION['form_data'] = $this->attributesSignup;
            $this->getErrorsSignup();
            header('Location: /user/signup');
            exit();
        }
        $this->saveUser();
    }

    public function validateSignup()
    {
        \Valitron\Validator::lang('ru');
        $validator = new \Valitron\Validator($this->attributesSignup);
        $validator->rules($this->rulesSignup);
        if ($validator->validate()) return true;
        $errors = call_user_func_array('array_merge', $validator->errors());
        $this->errorsSignup = array_shift($errors);
    }

    public function checkUser()
    {
        if (!empty($this->attributesSignup)) {
            $user = $this->createComand()->select()->from('users')->where(['login' => $this->attributesSignup['login'], 'email' => $this->attributesSignup['email']])->limit('1')->findOne();
            if ($user) {
                if ($user['login'] == $this->attributesSignup['login']) $this->errorsSignup = "Данный пользователь уже зарегестрирован";
                if ($user['email'] == $this->attributesSignup['email']) $this->errorsSignup = "Пользователь с таким Email уже существует";
                return false;
            }
            return true;
        }
    }

    public function saveUser()
    {
        $this->attributesSignup['password'] = password_hash($this->attributesSignup['password'], PASSWORD_DEFAULT);
        $query = $this->pdo->createComand()->insert($this->table, $this->attributesSignup)->query();
        if ($query) {
            $_SESSION['success'] = 'Вы успешно зарегестрировались';
            header('Refresh: 2; url=/user/login');
        } else {
            $_SESSION['errorsAuth'] = 'Ошибка регистрации';
        }
    }


    public function getErrorsSignup()
    {
        $_SESSION['errorsAuth'] = $this->errorsSignup;
    }


    public function login($login, $password)
    {

        if ($login && $password) {
            $user = $this->createComand()->select()->from('users')->where(['login' => $_POST['login']])->limit('1')->findOne();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $browser = new \Browser();
                    $token = bin2hex(random_bytes(16));
                    setcookie('user_token', $token, time() +3600);
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $agent = $browser->getBrowser();
                    $platform = $browser->getPlatform();
                    $role = $user['role'];
                    $query = $this->createComand()->insert('users_session', [
                        'id'=>$user['id'],
                        'token'=>$token,
                        'ip'=>$ip,
                        'agent'=>$agent,
                        'platform'=>$platform,
                        'role'=>$role
                    ])->query();
                    return true;
                }
            }
        }
        return false;
    }

}