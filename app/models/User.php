<?php


namespace App\Models;


use Core\Libs\Cache;
use Core\Model;
use MicrosoftAzure\Storage\Common\Internal\Validate;
use Valitron\Validator;
use function GuzzleHttp\Promise\exception_for;


class User extends Model
{
    protected $table = 'users';
    protected $errors = [];
    protected $attributesSignup = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ];
    protected $attributesLogin = [
        'login' => '',
        'password' => ''
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
    protected $rulesLogin = [
        'required' => [
            ['login'],
            ['password']
        ],
        'lengthMin' => [
            ['password', 6]
        ]
    ];


    public function userRegistration()
    {
        if (!$this->validate($this->attributesSignup, $this->rulesSignup) || !$this->checkUserSignup()) {
            $_SESSION['form_data'] = $this->attributesSignup;
            $this->getErrors();
            header('Location: /user/signup');
            exit();
        }
        $this->saveUser();
    }

    public function validate($attributes, $rules)
    {
        \Valitron\Validator::lang('ru');
        $validator = new \Valitron\Validator($attributes);
        $validator->rules($rules);
        if ($validator->validate()) return true;
        $errors = call_user_func_array('array_merge', $validator->errors());
        $this->errors = array_shift($errors);
    }

    public function checkUserSignup()
    {
        if (!empty($this->attributesSignup)) {
            $user = $this->createComand()->select()->from('users')->where(['login' => $this->attributesSignup['login'], 'email' => $this->attributesSignup['email']])->limit('1')->findOne();
            if ($user) {
                if ($user['login'] == $this->attributesSignup['login']) $this->errors = "Данный пользователь уже зарегестрирован";
                if ($user['email'] == $this->attributesSignup['email']) $this->errors = "Пользователь с таким Email уже существует";
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
            $_SESSION['errors'] = 'Ошибка регистрации';
        }
    }


    public function getErrors()
    {
        $_SESSION['errors'] = $this->errors;
    }


    public function login($login, $password, $remember)
    {
        if ($this->validate(['login' => $login, 'password' => $password], $this->rulesLogin)) {
            $user = $this->createComand()->select()->from('users')->where(['login' => $_POST['login']])->limit('1')->findOne();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $browser = new \Browser();
                    $token = bin2hex(random_bytes(16));
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $agent = $browser->getBrowser();
                    $platform = $browser->getPlatform();
                    $role = $user['role'];
                    $userSession = [
                        'id' => $user['id'],
                        'token' => $token,
                        'ip' => $ip,
                        'agent' => $agent,
                        'platform' => $platform,
                        'role' => $role
                    ];
                    $query = $this->createComand()->insert('users_session', $userSession)->query();
                    Cache::set($token, $userSession);
                    ($remember) ? setcookie('user_token', $token, time() + 3600) : $_SESSION['user_token'] = $token;
                    return true;
                }
            }
        } else {
            $this->getErrors();
        }
        $_SESSION['errors'] = 'Неверный логин или пароль';
    }


}