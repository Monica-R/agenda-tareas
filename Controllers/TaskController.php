<?php
    /**
     * @author Mónica Roka 
     * 
    */

    namespace Controllers;
    use Models\Connection;

    class TaskController {
        private $connection;
        //En el constructor, creo una instancia de la clase Connection
        //Y que esa conexión llame al método del modelo para conectarse a la BBDD
        public function __construct()
        {
            $instanceTask = new Connection();
            $this->connection = $instanceTask->getConnection();
        }

        
        public function createTask(){
            $messageLog = [
                "message" => "Tu tarea se ha creado correctamente.",
                "error" => false
            ];

            $_SESSION['message'] = $messageLog;

            try{
                //Si la sesión del usuario está iniciada, guárdame el id del usuario en la variable $id
                if (isset($_SESSION["user"])){
                    $id = $_SESSION["user"][0];
                }

                //Asigno variables para recoger los valores del formulario
                $title = $_REQUEST["title"];
                $initDate = $_REQUEST["init_date"];
                $endDate = $_REQUEST["end_date"];
                $description = $_REQUEST["description"];

                //limpiar y escapar valores para evitar inyecciones SQL
                $title = $this->connection->quote($title);
                $initDate = $this->connection->quote($initDate);
                $endDate = $this->connection->quote($endDate);
                $description = $this->connection->quote($description);

                //Realizo la consulta para insertar
                $insert = "INSERT INTO task (title, input_date, expiration_date, description, user_ID) 
                        VALUES ($title, $initDate, $endDate, $description, $id)";
                //Preparo la conexión
                $query = $this->connection->prepare($insert);
                //La ejecuto
                $query->execute();

            } catch (\PDOException $error) {
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                //registrar el error
                error_log($error->getMessage());
            }
        }

        
        public function readAllTasks($userId){
            //Preparo la conexión para buscar todas las tareas del usuario
            $query = $this->connection->prepare("SELECT * FROM task
                                                WHERE task.user_ID =:user_ID");
            
            //Enlazo el parámetro user_Id de la función con los parámetros de la consulta con bindValue
            $query->bindValue(":user_ID", $userId, \PDO::PARAM_INT);
            //Ejecuto
            $query->execute();
            //Devuelvo el resultado
            return $query->fetchAll();
        }

        
        public function updateTask($task_id){
            $messageLog = [
                "message" => "Tarea actualizada.",
                "error" => false
            ];

            $_SESSION['message'] = $messageLog;

            try{
                $update = "UPDATE task 
                            SET title=:title, input_date=:input_date, expiration_date=:expiration_date, description=:description 
                            WHERE task_id=:task_id";
                $query = $this->connection->prepare($update);
                $query->execute([
                    ":task_id" => $_REQUEST["id"],
                    ":title" => $_REQUEST["title"],
                    ":input_date" => $_REQUEST["init_date"],
                    ":expiration_date" => $_REQUEST["end_date"],
                    ":description" => $_REQUEST["description"]
                ]);
            } catch (\PDOException $error){
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                //registrar el error
                error_log($error->getMessage());
            }
        }
        
        
        public function deleteTask($task_id){

            $delete = "DELETE FROM task WHERE task_id=:task_id";
            $query = $this->connection->prepare($delete);
            $query->bindValue(':task_id', $task_id, \PDO::PARAM_INT);
            $query->execute();

        }
        
        public function changeStatus($task_id){
            //Preparo la conexión a la bbdd actualizando el estado de la tarea
            $query = $this->connection->prepare("UPDATE task 
                                                SET status = NOT status
                                                WHERE task_id = :task_id");
            $query->bindValue(':task_id', $task_id, \PDO::PARAM_INT);
            //ejecutamos la consulta 
            $query->execute();
        }

        public function getStatus($task_id) {
            $query = $this->connection->prepare("SELECT status
                                        FROM task 
                                        WHERE task_id = :task_id");
        
            $query->execute(["task_id" => $task_id]);
            return $query->fetchColumn();
        }
    }
