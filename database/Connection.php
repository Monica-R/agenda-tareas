<?php
Class Connection {
    private $connection;
    private $instance;

    public function __construct()
    {
        $this->setConnection();
    }

    private function setConnection(){
        $username = '';
        $password = '';
        $server = '';
        $dbname = '';
        $charset = 'utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $connection = new PDO("mysql:host=$server;dbname=$dbname;charset=$charset", $username, $password, $options);
        
        $this->connection=$connection;

    }

    public function getConnection(){
        return $this->connection;
    }
}