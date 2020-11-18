<?php


namespace App\Models;


class Registration extends User
{

    public function userRegistration()
    {
        if (!$this->validate($this->attributesSignup, $this->rulesSignup) || !$this->checkUserSignup()) {
            $_SESSION['form_data'] = $this->attributesSignup;
            $this->getErrors();
            return false;
        }
        return $this->saveUser();
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
            return true;
        } else {
            $_SESSION['errors'] = 'Ошибка регистрации';
            return false;
        }
    }

}