<?php
    class categories {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        public function addNewCategory($data){
            $this->db->prepare(" insert into categories (name,image) values (:name,:image)");
            $this->db->bindValue(':name',$data['name']);
            $this->db->bindValue(':image',$data['image']);
            if($this->db->execute()){
                //thêm list hình tại đây
                $lastInsertId = $this->db->lastInsertId();
                return true;
            }
            else{
                return false;
            }
        }

    }
?>