<?php


namespace Core\Libs;

use Core\Libs\Cache;

class QueryBuilder
{

    private $pdo;
    private static $sql;
    private static $params = [];


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    protected function funcParamsToString($args)
    {
        $params = '';
        if ($args) {
            foreach ($args as $key => $item) {

                if (is_array($item)) {
                    $params = implode(', ', $item);
                } elseif (is_string($item)) {
                    $params .= $item . (next($args) ? ', ' : ' ');
                }
            }
        } else {
            $params = '*';
        }
        return $params;
    }

    public function select()
    {
        $args = func_get_args();
        $sql = 'SELECT ';
        $params = $this->funcParamsToString($args);
        $sql .= $params . ' ';
        self::$sql .= $sql;
        return $this;
    }

    public function selectDistinct()
    {
        $args = func_get_args();
        $sql = 'SELECT DISTINCT ';
        $params = $this->funcParamsToString($args);
        $sql .= rtrim($params, ', ') . ' ';
        self::$sql .= $sql;
        return $this;
    }

    public function insert($table, $values)
    {
        $insertKeys = '';
        $insertAggregate = '';
        foreach ($values as $key => $value) {
            $insertKeys .= $key . (next($values) ? ', ' : '');
            $insertAggregate .= ':' . $key . (!(array_key_last($values) === $key) ? ', ' : '');
        }
        $sql = "INSERT INTO {$table}({$insertKeys}) VALUES ({$insertAggregate}) ";
        self::$sql = $sql;
        self::$params = $values;
        return $this;
    }

    public function from()
    {
        $args = func_get_args();
        $sql = 'FROM ';
        $params = $this->funcParamsToString($args);
        $sql .= $params . ' ';
        self::$sql .= $sql;
        return $this;
    }

    /**
     * Формирует строку запроса WHERE, принимает массив вида ['login' => $login, 'password'=>'password']
     * @param array $params
     * @return $this
     */
    public function where($params = [])
    {
        self::$params = array_merge(self::$params, $params);
        $sql = 'WHERE ';
        foreach ($params as $key => $value) {
            $sql .= $key . '=' . ':' . $key . (next($params) ? ' OR ' : ' ');
        }
        self::$sql .= $sql;
        return $this;
    }

    public function count($table)
    {
        $sql = "SELECT COUNT(*) FROM  {$table}";
        $data = $this->pdo->prepare($sql);
        $data->execute();
        $res = $data->fetchAll();
        $count = $res[0]['COUNT(*)'];
        return $count;
    }

    /**
     * Формирует строку запроса LIMIT, принимает 2 параметра int or str
     * @param $start
     * @param string $end
     * @return $this
     */
    public function limit($start, $end = '')
    {
        if ($end) {
            $sql = 'LIMIT :start, :end ';
            $params = ['start' => $start, 'end' => $end];
        } else {
            $sql = 'LIMIT :start ';
            $params = ['start' => $start];
        }
        self::$sql .= $sql;
        self::$params = array_merge(self::$params, ($params));
        return $this;
    }

    /**
     * Используется для добавления записей в БД
     * @return mixed
     */
    public function query()
    {
        $data = $this->pdo->prepare(self::$sql);
        $data->execute(self::$params);
        $this->clear();
        return $data;
    }

    /**
     * Возвращает ассоциативный массив- результат запроса к БД
     * @return mixed
     */
    public function execute()
    {
        $keyForCache = base64_encode(self::$sql . implode(self::$params));
        if (Cache::get($keyForCache)) {
            $this->clear();
            return Cache::get($keyForCache);
        }
        $data = $this->pdo->prepare(self::$sql);
        $data->execute(self::$params);
        $res = $data->fetchAll();
        Cache::set($keyForCache, $res);
        $this->clear();
        return $res;
    }

    public function findOne()
    {
        $data = $this->pdo->prepare(self::$sql);
        $data->execute(self::$params);
        $res = $data->fetch();
        $this->clear();
        return $res;
    }

    /**
     * Функция очистки конструктора запросов от предыдущих запросов
     */
    private function clear()
    {
        self::$sql = '';
        self::$params = [];
    }

}