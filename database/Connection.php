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
        $password= '';
        $server = '';
        $dbname='';

        $connection = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
        
        $this->connection=$connection;

    }

    public function getConnection(){
        return $this->connection;
    }
}