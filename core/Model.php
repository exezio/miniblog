<?php


namespace Core;

use Core\Libs\DataBase;
use Dotenv\Validator;


abstract class Model
{

    protected $pdo;
    protected $table;
    public $attributesAuth = [];
    public $errorsAuth = [];
    public $rulesAuth = [];


    public function __construct()
    {
        $this->pdo = DataBase::instance();
    }

    public function load($data)
    {
        foreach ($this->attributesAuth as $item => $value)
        {
            if(isset($data[$item])) $this->attributesAuth[$item] = $data[$item];
        }
    }
    public function validate($data)
    {
        $validator = new \Valitron\Validator($data);
        $validator->rules($this->rulesAuth);
        if($validator->validate()) return true;
        $this->errorsAuth = $validator->errors();
        return false;
    }

    public function getErrors()
    {
        $errors = '<ul>';
        foreach ($this->errorsAuth as $item)
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