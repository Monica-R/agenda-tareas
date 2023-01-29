<?php
    /**
     * @author Monica Roka
     */

    namespace Controller;
    use Models\Connection;
    
    class LoginController {
        private $connection;

        public function __construct()
        {
            $instanceLogin = new Connection();
            $this->connection = $instanceLogin->getConnection();
        }

        public function checkPassword($email, $password){
            $query = $this->connection->prepare("SELECT user_id, email, passwd 
                                                FROM users 
                                                WHERE email = :email");
            //Enlazo los parámetros de la función con los parámetros de la consulta con bindParam

            $query->bindParam(":email", $email);

            //ejecutamos
            $query->execute();
            //esa ejecución la guardamos en una variable para comprobar
            $result = $query->fetch();

            if($result["passwd"] == $password) {
                $_SESSION["user"][] = $result["user_id"];
                return true;
            } else {
                return false;
            }

        }

        public function login($email, $password){
            if($this->checkPassword($email, $password)){
                $_SESSION["user"][] = $email;
                header("refresh: 0, url = profile");
            } else {
                header("refresh: 0, url = index");
            }
        }

        public function logout() {
            //Cerrar sesión
            if($_SESSION){
                session_destroy();
                header("refresh: 0, url = index");
            }
        }
    }
?>