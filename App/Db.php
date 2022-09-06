<?php

namespace App;

use App\Exceptions\DbConnectionException;
use App\Exceptions\SqlException;

class Db
{

    protected $dbh;

    public function __construct()
    {
        try {
            $config = Config::getInstance();
            $this->dbh = new \PDO(
                'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
                $config->data['db']['user'], $config->data['db']['password'],
            );
        } catch (\PDOException $error) {
            throw new DbConnectionException('Нет соединения с БД');
        }
    }

    /**
     * @throws SqlException
     */
    public function query($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($data);
        if (!$res) {
            throw new SqlException($sql,'Запрос не может быть выполнен');
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, $params = [])
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}