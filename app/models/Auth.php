<?php


namespace App\Models;


use Core\Libs\Cache;
use Core\Libs\Registr;

class Auth extends User
{

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
                    Registr::set('token', $token);
                    ($remember) ? setcookie('user_token', $token, time() + 3600, '/') : $_SESSION['user_token'] = $token;
                    $this->token = $token;
                    return true;
                }
            }
        } else {
            $this->getErrors();
        }
        $_SESSION['errors'] = 'Неверный логин или пароль';
        return false;
    }

}