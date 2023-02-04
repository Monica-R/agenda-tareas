<?php
    /**
     * @author Monica Roka
     */

    namespace Controllers;
    use Models\Connection;
    
    class LoginController {
        private $connection;
        //En el constructor, creo una instancia de la clase Connection
        //Y que esa conexión llame al método del modelo para conectarse a la BBDD
        public function __construct()
        {
            $instanceLogin = new Connection();
            $this->connection = $instanceLogin->getConnection();
        }

        public function checkPassword($email, $password){
            //Preparo la conexión
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
            //Llamo a la función checkPassword para que compruebe la contraseña
            //Si es correcta, que me asigne el email al array $_SESSION, y me redireccione al perfil
            if($this->checkPassword($email, $password)){
                $_SESSION["user"][] = $email;
                header("refresh: 0, url = profile");
            } else {
                //sino, me devuelve a index
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