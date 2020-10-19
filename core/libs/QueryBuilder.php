<?php


namespace Core\Libs;
use Core\Libs\Cache;

class QueryBuilder
{

    private  $pdo;
    private static $sql;
    private static $params = [];




    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    protected function funcParamsToString($args)
    {
        $params = '';
        if ($args)
        {
            foreach ($args as $key => $item)
            {

                if (is_array($item))
                {
                    $params = implode(', ', $item);
                } elseif (is_string($item))
                {
                    $params .=  $item . (next($args)? ', ' : ' ');
                }
            }
        } else
        {
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
        foreach ($values as $key => $value)
        {
            $insertKeys .= $key . (next($values) ? ', ' : '');
            $insertAggregate .= ':' . $key . (!(array_key_last($values) === $key) ?  ', ' : '');
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

    public function where($sql, $params = [])
    {
        self::$params = $params;
        $args = func_get_args();
        $sql = 'WHERE ';
        $params = $this->funcParamsToString($args);
        $sql .= $params . ' ';
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

    public function limit($start, $end)
    {
        $sql = 'LIMIT :start, :end ';
        self::$sql .= $sql;
        $params = ['start' => $start, 'end' => $end];
        self::$params = $params;
        return $this;
    }

    public function query()
    {
        $data = $this->pdo->prepare(self::$sql);
        return $data->execute(self::$params);
    }

    public function execute()
    {
        if(!Cache::exists(self::$sql))
        {
                $data = $this->pdo->prepare(self::$sql);
                $data->execute(self::$params);
                $res = $data->fetchAll();
                Cache::set(self::$sql, $res);
                return $res;

        } else
        {
            return Cache::get(self::$sql);
        }
    }

}