<?php

    class users{
        private $Provider;
        
        public function __construct(){
            $this->Provider = new Database();
        }
        
        public function getData(){
            return 'my data from model';
        }

        public function register($param){
            // $query = "INSERT INTO users (username,password,fullname,email) VALUES(:username,:password,:fullname,:email)";
            // $this->Provider->prepare($query);
            // $this->Provider->bindValue(':username', $param['username']);
            // $this->Provider->bindValue(':password', $param['password']);
            // $this->Provider->bindValue(':fullname', $param['fullname']);
            // $this->Provider->bindValue(':email', $param['email']);
            // $executeRs = $this->Provider->execute();
            // echo ($executeRs);
        }
    }

