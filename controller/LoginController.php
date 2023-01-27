<?php
    /**
     * @author Monica Roka
     */

    use Models\Connection;

    class LoginController {
        private $connection;

        public function __construct()
        {
            $instanceLogin = new Connection();
            $this->connection = $instanceLogin->getConnection();
        }

        public function checkCredentials($username, $password){
            $messageLog = [
                "message" => "",
                "error" => false
            ];
            try{
                $query = $this->connection->prepare("SELECT * FROM users WHERE username = :username AND passwd = :passwd");
                //Enlazo los parámetros de la función con los parámetros de la consulta con bindParam

                $query->bindParam(":username", $username);
                $query->bindParam(":passwd", $password);

                //ejecutamos
                $query->execute();
                //esa ejecución la guardamos en una variable para comprobar
                $result = $query->fetch();

                if($result) {
                    return true;
                } else {
                    return false;
                }

            } catch (PDOException $error){
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                error_log($error->getMessage());
            }
        }

        public function login($username, $password){
            if($this->checkCredentials($username, $password)){
                session_start();
                $_SESSION["username"] = $username;
                return true;
            } else {
                return false;
            }
        }

        public function logout() {
            //Cerrar sesión
            session_start();
            session_destroy();
        }
    }
?>