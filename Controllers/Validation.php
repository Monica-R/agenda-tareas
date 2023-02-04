<?php

    require_once '../Views/register.php' ;
    /**
     * AVISO: esta clase NO se está usando.
     */

    class Validation {
        public static function confirm(){
            $confirm = true;
            if (!Validation::isNotBlank()){
                $confirm = false;
            }
            return $confirm;
        }

        public function isNotBlank(){
            if(isset($_REQUEST["name"]) && $_REQUEST["name"] !== ''){
                if (isset($_REQUEST["email"]) && $_REQUEST["email"] !== ''){
                    if(isset($_REQUEST["pass"]) && $_REQUEST["pass"] !== ''){
                        return true;
                    }
                }
            } 
            return false;            
        }

        //public function
    }
?>