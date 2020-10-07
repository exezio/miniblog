<?php


namespace Core;

use Core\Libs\DataBase;


abstract class Model
{

    protected $pdo;
    protected $table;


    public function __construct()
    {
        $this->pdo = DataBase::instance();
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