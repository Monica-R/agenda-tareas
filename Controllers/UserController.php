<?php
    /**
     * @author Mónica Roka
     * @description 
     * En este archivo se desarrolla el controlador para la tabla usuario
     * Es importante crear una nueva instancia, y con ella
     * tomar la conexión con el método getConnection() de la clase Connection
     */

    namespace Controllers;
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

            $_SESSION['message'] = $messageLog;

            try{

                $username = $_REQUEST["name"];
                $emailUser = $_REQUEST["email"];
                $passwdUser = $_REQUEST["pass"];

                //limpiar y escapar valores para evitar inyecciones SQL
                $username = $this->connection->quote($username);
                $emailUser = $this->connection->quote($emailUser);
                $passwdUser = $this->connection->quote($passwdUser);

                $insert = "INSERT INTO users (username, email, passwd) VALUES ($username, $emailUser, $passwdUser)";
                $query = $this->connection->prepare($insert);
                $query->execute();

            } catch (PDOException $error) {
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                //registrar el error
                error_log($error->getMessage());
            }
            
        }

        public function updateUser($user_id){
            $messageLog = [
                "message" => "Tu cuenta de usuario se ha actualizado correctamente.",
                "error" => false
            ];

            $_SESSION['message'] = $messageLog;

            try{
                $update = "UPDATE users SET username=:username, email=:email, passwd=:passwd 
                            WHERE user_id=:user_id";
                $query = $this->connection->prepare($update);
                $query->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
                $query->bindValue(":username", $_REQUEST["name"], \PDO::PARAM_STR);
                $query->bindValue(":email", $_REQUEST["email"], \PDO::PARAM_STR);
                $query->bindValue(":passwd", $_REQUEST["pass"], \PDO::PARAM_STR);
                $query->execute();
                $email = $_REQUEST["email"];
            
                $_SESSION["user"][1] = $email;
            
            } catch (PDOException $error){
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                //registrar el error
                error_log($error->getMessage());
            }
        }

        public function deleteUser($user_id){
            $delete_tasks = "DELETE FROM task WHERE user_ID=:user_id";
            $query_tasks = $this->connection->prepare($delete_tasks);
            $query_tasks->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
            $query_tasks->execute();


            $delete_user = "DELETE FROM users WHERE user_id = :user_id";
            $query = $this->connection->prepare($delete_user);
            $query->bindValue(":user_id", $user_id, \PDO::PARAM_INT);
            $query->execute();

            //NOTA: PARA ELIMINAR EL USUARIO PRIMERO DEBES ELIMINAR TODAS SUS TAREAS
            //AQUÍ NO SIRVE EL INNER/LEFT/RIGHT JOIN
            session_destroy();
            header("refresh: 0, url = index");
        }

        //ESTE MÉTODO NO SE ESTÁ USANDO, normalmente sólo el administrador puede dar uso de ello
        public function readAllUsers(){
            //realizo una consulta a la BBDD
            $query = $this->connection->prepare("SELECT * FROM users");
            //la ejecuto
            $query->execute();
            //devuelvo el resultado
            return $query->fetchAll();
        }
    }
