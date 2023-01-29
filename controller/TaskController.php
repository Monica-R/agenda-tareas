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

        // Function Read tasks {#3be, 7}
        public function readAllTasks(){
            $query = $this->connection->prepare("SELECT * FROM task
                                                INNER JOIN users
                                                ON task.user_ID = users.user_id");
            $query->execute();
            return $query->fetchAll();
        }

        // Function Update task {#666, 28}
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
        
        // Function Delete task {#ddb, 8}
        public function deleteTask($task_id){

            $delete = "DELETE FROM task WHERE task_id=:task_id";
            $query = $this->connection->prepare($delete);
            $query->bindValue(':task_id', $task_id, \PDO::PARAM_INT);
            $query->execute();

        }
        
        public function changeStatus($task_id){
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
