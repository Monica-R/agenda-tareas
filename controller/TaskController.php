<?php
    /**
     * @author Mónica Roka 
     * 
    */

    namespace Controller;
    use Models\Connection;

    class TaskController {
        private $connection;

        public function __construct()
        {
            $instanceTask = new Connection();
            $this->connection = $instanceTask->getConnection();
        }

        // Function Create task {#17d,36}
        public function createTask(){
            $messageLog = [
                "message" => "Tu tarea se ha creado correctamente.",
                "error" => false
            ];

            $_SESSION['message'] = $messageLog;

            try{
                if (isset($_SESSION["user"])){
                    $id = $_SESSION["user"][0];
                }
                $title = $_REQUEST["title"];
                $initDate = $_REQUEST["init_date"];
                $endDate = $_REQUEST["end_date"];
                $description = $_REQUEST["description"];

                //limpiar y escapar valores para evitar inyecciones SQL
                $title = $this->connection->quote($title);
                $initDate = $this->connection->quote($initDate);
                $endDate = $this->connection->quote($endDate);
                $description = $this->connection->quote($description);

                $insert = "INSERT INTO task (title, input_date, expiration_date, description, user_ID) 
                        VALUES ($title, $initDate, $endDate, $description, $id)";
                $query = $this->connection->prepare($insert);
                $query->execute();

            } catch (\PDOException $error) {
                $messageLog["error"] = true;
                $messageLog["message"] = $error->getMessage();

                //registrar el error
                error_log($error->getMessage());
            }
        }

        // Function Read tasks {#3be, 8}
        public function readAllTasks(){
            $query = $this->connection->prepare("SELECT * FROM task
                                                INNER JOIN users
                                                ON task.user_ID = users.user_id");
            $query->execute();
            return $query->fetchAll();
        }

        // Function Update task {#666, 1}
        public function updateTask(){}
        
        // Function Delete task {#ddb, 1}
        public function deleteTask(){}
        
        public function setStatus(){
            $query = $this->connection->prepare("SELECT status 
                                                FROM task 
                                                WHERE task_id = :task_id");
            //Enlazo los parámetros de la función con los parámetros de la consulta con bindParam

            $query->bindParam(":task_id", $_POST["idHidden"]);

            //ejecutamos
            $query->execute();
            //esa ejecución la guardamos en una variable para comprobar
            $result = $query->fetch();

            $newStatus = !$result;
            $updateQuery = $this->connection->prepare("UPDATE task 
                                                        SET status = :status
                                                        WHERE task_id = :task_id");

            $updateQuery->bindValue(":status", $newStatus, \PDO::PARAM_BOOL);
            $updateQuery->bindValue(":task_id", $_POST["idHidden"], \PDO::PARAM_INT);
            $updateQuery->execute();

        }
    }
