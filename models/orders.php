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
                return $this->db->lastInsertId();
            }else{
                return false;
            }

        }

        public function getOrdersOfUser($username){
            $query = "select o.* from orders o,users u where o.user = u.id and u.username = (:username)";
            $this->db->prepare($query);
            $this->db->bindValue(':username',$username,'string');
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }
       
        
        public function updateOrderStatus($id){
            $query = "update orders set status = !status,delivereddate = NOW() where id = (:id)";
            $this->db->prepare($query);
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function getAllOrders(){
            $query = "select o.* from orders o";
            $this->db->prepare($query);
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }

        public function getOrderDetail($orderId){
            $query = "select p.name as name,p.image as image,p.price as singlePrice, od.price as totalPrice, od.quantity as quantity
                        from order_details od, products p
                        where od.product = p.id and od.orderid = (:orderId)";
          //  $query = "select * from order_details where orderid = (:orderId)";
            $this->db->prepare($query);
            $this->db->bindValue(':orderId',$orderId,'int');
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }



      //  public function 
        
       
        



    }

