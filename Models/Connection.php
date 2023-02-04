<?php
namespace Models;
Class Connection {
    private $connection;

    public function __construct()
    {
        $this->setConnection();
    }

    private function setConnection(){
        // $username = '';
        // $password = 'daw123';
        $server = $_ENV["DB_HOST"];
        $dbname = $_ENV["DB_DB"];
        $charset = 'utf8mb4';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false
        ];

        $connection = new \PDO("mysql:host=$server;dbname=$dbname;charset=$charset", $_ENV["DB_USER"], $_ENV["DB_PASS"], $options);
        $this->connection=$connection;

    }

    public function getConnection(){
        return $this->connection;
    }
}