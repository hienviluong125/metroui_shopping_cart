<?php

    class orders{
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        public function addOrderDetal($product,$orderid,$quantity,$price){
            $query = "insert into order_details(product,orderid,quantity,price) values(:product,:orderid,:quantity,:price)";
            $this->db->prepare($query);
            $this->db->bindValue(':product',$product,'int');
            $this->db->bindValue(':orderid',$orderid,'int');
            $this->db->bindValue(':quantity',$quantity,'int');
            $this->db->bindValue(':price',$price,'int');
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function addOrder($user,$totalPrice){
            $query = "insert into orders(user,price) values(:user,:price)";
            $this->db->prepare($query);
            $this->db->bindValue(':user',$user,'int');
            $this->db->bindValue(':price',$totalPrice,'int');
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function getOrderIDOfUser($userid){
            $query = "select id from orders where user = (:user)";
            $this->db->prepare($query);
            $this->db->bindValue(':user',$userid,'int');
            if($this->db->execute()){
                return $this->db->fetchOne();
            }else{
                return null;
            }
        }
        
       
        



    }

