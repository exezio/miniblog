<?php


namespace Core;

use Core\Libs\DataBase;
use Dotenv\Validator;
use Core\Libs\Registr;


abstract class Model
{

    protected $pdo;
    protected $table;
    protected $attributesSignup;



    public function __construct()
    {
        $this->pdo = DataBase::instance();
    }

    public function loadAttributes($data)
    {
        foreach ($this->attributesSignup as $item => $value)
        {
            if(isset($data[$item])) $this->attributesSignup[$item] = $data[$item];
        }

    }

    public function createComand()
    {
        return $this->pdo->createComand();
    }

}