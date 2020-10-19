<?php


namespace Core;

use Core\Libs\DataBase;
use Dotenv\Validator;
use Core\Libs\Registr;


abstract class Model
{

    protected $pdo;
    public $table;
    public $attributesSignup = [];
    public $errorsSignup = [];
    public $rulesSignup = [];


    public function __construct()
    {
        $this->pdo = DataBase::instance();
    }

    public function loadAttributesSignup($data)
    {
        foreach ($this->attributesSignup as $item => $value)
        {
            if(isset($data[$item])) $this->attributesSignup[$item] = $data[$item];
        }
    }



    public function saveAttributesSignup()
    {
        return $this->pdo->createComand()->insert($this->table, $this->attributesSignup)->query();
    }

    public function validateSignup($data)
    {
        $validator = new \Valitron\Validator($data);
        $validator->rules($this->rulesSignup);
        if($validator->validate()) return true;
        $this->errorsSignup = $validator->errors();
        return false;
    }


    public function getErrorsSignup()
    {
        $errors = '<ul>';
        foreach ($this->errorsSignup as $item)
        {
            foreach ($item as $error) {
            $errors .= "<li>$error</li>";
         }
        }
        $errors .= "</ul>";
        return $_SESSION['errorsAuth'] = $errors;
    }


    public function query($sql, $params = [])
    {
        return $this->pdo->getQuery($sql, $params);
    }

    public function queryAll($sql, $params = [])
    {
        return $this->pdo->getQueryAll($sql, $params);
    }

    public function createComand()
    {
        return $this->pdo->createComand();
    }

}