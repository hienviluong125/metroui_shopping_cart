<?php

    class users{
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }
        
        public function getAllUsers(){
            $query = "select username,fullname,avatar,email,role,phone,address from users";
            $this->db->prepare($query);
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }

        public function register($param){
            if($param['password'] != $param['passwordConfirm']){
                return false;
            }
            else{
                $hash = md5($param['password']);
                $query = 
                "INSERT INTO users (username,password,fullname,email) 
                VALUES(:username,:password,:fullname,:email)";
                $this->db->prepare($query);
                $this->db->bindValue(':username',$param['username'],'string');
                $this->db->bindValue(':password',$hash,'string');
                $this->db->bindValue(':fullname',$param['fullname'],'string');
                $this->db->bindValue(':email',$param['email'],'string');
                $isSuccess = $this->db->execute();
                if($isSuccess){
                    return true;
                }else{
                    return false;
                }
            }
          
        }

        public function login($param){
            // -1 : username no exist, 0 : password no correct, 1 : login success
            $query = "select * from users where users.username = :username";
            $this->db->prepare($query);
            $this->db->bindValue(':username',$param['username'],'string');
            $this->db->execute();
            $user = $this->db->fetchOne();
            if(isset($user) && !empty($user) ){
               //if exist user
                //check correct password
                $hash = md5($param['password']);
                if($user->password == $hash){
                    $userStorage = [
                        'username'=>$user->username,
                        'role'=>$user->role
                    ];
                    createSession('user',$userStorage);
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }
        
        // public function 



    }

