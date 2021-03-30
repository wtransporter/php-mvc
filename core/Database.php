<?php

namespace app\core;

class Database
{
    public \PDO $pdo;
    
    public function __construct(array $config)
    {
        $dsn = $config['dsn'];
        $username = $config['username'];
        $password = $config['password'];

        $this->pdo = new \PDO($dsn, $username, $password);
    }
}