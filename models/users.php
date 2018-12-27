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

        public function getInfoUser($username){
            $query = "select id,password,username,fullname,avatar,email,role,phone,address from users where username = (:username)";
            $this->db->prepare($query);
            $this->db->bindValue(':username',$username,'string');
            if($this->db->execute()){
                return $this->db->fetchOne();
            }else{
                return null;
            }
        }

        public function changePasswordByUsername($username,$password){
            $query = "update users set 
                    password = (:password)
                    where username = (:username)           
            ";
            $this->db->prepare($query);
            $this->db->bindValue(':username',$username,'string');
            $this->db->bindValue(':password',$password,'string');
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        public function updateInfoByUsername($username, $data){
            $query = "update users set 
                    fullname = (:fullname),
                    email = (:email),
                    phone = (:phone),
                    address = (:address),
                    avatar = (:avatar)
                    where username = (:username)           
                    ";

            $this->db->prepare($query);
            $this->db->bindValue(':fullname',$data['fullname'],'string');
            $this->db->bindValue(':email',$data['email'],'string');
            $this->db->bindValue(':phone',$data['phone'],'string');
            $this->db->bindValue(':address',$data['address'],'string');
            $this->db->bindValue(':avatar',$data['avatar'],'string');
            $this->db->bindValue(':username',$username,'string');
            if($this->db->execute()){
                return true;
            }else{
                return false;
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
                    return 1;
                }else{
                    return 0;
                }
            }else{
                return -1;
            }
        }
        
        //  public function orders(){

        //  }



    }

