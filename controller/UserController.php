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

    use PDOException;

    class UserController {

        private $connection;

        public  function __construct()
        {
            $instance = new Connection(); //creo instancia de la clase connection
            $this->connection = $instance->getConnection(); //llamo al metodo publico
        }

        public function createUser(){
            $messageLog = [
                "message" => "Tu cuenta de usuario se ha creado correctamente.",
                "error" => false
            ];
            echo 'HOLAAAAAA';
            try{

                $username = $_REQUEST["name"];
                $emailUser = $_REQUEST["email"];
                $passwdUser = $_REQUEST["pass"];
                echo 'estoyy dentroooooo';

                $insert = "INSERT INTO Users (username, email, passwd) VALUES ($username, $emailUser, $passwdUser)";
                $query = $this->connection->prepare($insert);
                $query->execute();

            } catch (PDOException $error) {
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();
                echo "ESTO ES UNA MIERDAAAAAA";
            }
            
        }

        public function updateUser(){}

        public function deleteUser(){}

        public function readAllUsers(){
            //realizo una consulta a la BBDD
            $query = $this->connection->prepare("SELECT * FROM Users");
            //la ejecuto
            $query->execute();
            //devuelvo el resultado
            return $query->fetchAll();
        }
    }

?>