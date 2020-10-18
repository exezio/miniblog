<?php


namespace Core\Libs;

use Libs\SingletonTrait;
use PDO;
use PDOException;
use Core\Libs\QueryBuilder;


class DataBase
{

    use SingletonTrait;


    protected $pdo;
    protected $countQueries = 0;
    protected $archiveRequests = [];
    protected $queryBuilder;

    public function __construct()
    {
        $cfgDB = [
            'dsn' => "mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}",
            'user' => "{$_ENV['DB_USER']}",
            'pass' => "{$_ENV['DB_PASSWORD']}"
        ];
        try
        {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        //Выводит исключения, если они происходят
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $this->pdo = new PDO($cfgDB['dsn'], $cfgDB['user'], $cfgDB['pass'], $options);
        } catch (PDOException $error)
        {
            $error->getMessage();
        }
    }

    public function getQuery($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $data = $statement->fetch();
    }

    public function getQueryAll($sql, $params)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $data = $statement->fetchAll();
    }

    public function createComand()
    {
        $this->queryBuilder = new QueryBuilder($this->pdo);
        return $this->queryBuilder;
    }

}