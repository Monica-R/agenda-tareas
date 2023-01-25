<?php
    /**
     * @author Mónica Roka
     * @var userID
     * @var username
     * @var email
     */

    class User {
        private $userID;
        private $username;
        private $email;
        private $password;
        private $registrationDate;

        public function __construct($userID, $username, $email, $password){
            $this->userID = $userID;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        protected function confirm(){
            $confirm = true;
            if ($confirm){

            }
        }

        public function createUser(){

        }

        public function updateUser(){}

        public function deleteUser(){}

        public function editUser(){}
    }

?>