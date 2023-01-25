<?php
    /**
     * @author Mónica Roka
     * @description 
     * En este archivo se desarrolla el controlador para la tabla usuario
     * Es importante crear una nueva instancia, y con ella
     * tomar la conexión con el método getConnection() de la clase Connection
     */

    namespace Controller;
    use Models\Connection;

    class UserController {

        private $connection;

        public function __construct()
        {
            $instance = new Connection(); //creo instancia de la clase connection
            $this->connection = $instance->getConnection(); //llamo al metodo publico
        }

        public function createUser(){

        }

        public function updateUser(){}

        public function deleteUser(){}

        public function readAllUsers(){
            //realizo una consulta a la BBDD
            $query = $this->connection->prepare("SELECT * FROM User");
            //la ejecuto
            $query->execute();
            //devuelvo el resultado
            return $query->fetchAll();
        }
    }

?>