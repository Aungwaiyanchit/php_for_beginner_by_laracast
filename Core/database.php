<?php

namespace Core;
use PDO;

class DataBase
{
    public $connection;

    protected ?\PDOStatement $statement = null;

    /**
     * @param  mixed  $config
     * @param  mixed  $username
     * @param  mixed  $password
     */
    public function __construct($config, $username = 'root', $password = '')
    {

        $dsn = 'mysql:'.http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    /**
     * @param  mixed  $query
     * @param  mixed  $params
     */
    public function query($query, $params = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get(): mixed
    {
        return $this->statement->fetchAll();
    }

    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): mixed
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;

    }
}
