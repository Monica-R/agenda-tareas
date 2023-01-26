<?php
    /**
     * @author Mónica Roka 
     * 
    */

    use Models\Connection;

    class TaskController {
        private $connection;

        public function __construct()
        {
            $instanceTask = new Connection();
            $this->connection = $instanceTask->getConnection();
        }

        // Function Create task {#17d,1}
        public function createTask(){}

        // Function Read tasks {#3be, 5}
        public function readAllTasks(){
            $query = $this->connection->prepare("SELECT * FROM task");
            $query->execute();
            return $query->fetchAll();
        }

        // Function Update task {#666, 1}
        public function updateTask(){}
        
        // Function Delete task {#ddb, 1}
        public function deleteTask(){}
    }
