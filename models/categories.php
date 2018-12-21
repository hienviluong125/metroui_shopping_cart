<?php

    class categories {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        //thêm loại sản phẩm
        public function addNewCategory($data){
            $this->db->prepare(" insert into categories (name,image,link_name) values (:name,:image,:link_name)");
            $this->db->bindValue(':name',$data['name'],'string');
            $this->db->bindValue(':image',$data['image'],'string');
            $this->db->bindValue(':link_name',$data['link_name'],'string');
            if($this->db->execute()){
               return true;
            }
            else{
                return false;
            }
        }

        //lấy 1 loại theo id
        public function getCategoryById($id){
            $result = '';
            $this->db->prepare("select c.id,c.name,c.link_name,c.image  from categories c where id =(:id)");
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                $result = $this->db->fetchOne();
            }
            return $result;
        }

        //lấy tất cả loại
        public function getAllCategories($page){
            $rowPersPage = 10;
            $count = 0;
            $offset = ($page-1) * $rowPersPage;
            $limit = ($page * $rowPersPage) - 1; 
            $result = [];
            
            $this->db->prepare("select * from categories order by id desc");
            if($this->db->execute()){
                $result = $this->db->fetchAll();
                if($page != 0){
                    $nRows = count($result);
                    $count = ceil($nRows / $rowPersPage);
                    $result = array_slice($result, $offset, $limit+1); 
                }
            }
            return $result;
        }

        //xóa 1 loại theo id
        public function deleteCategoryById($id){
            $result = false;
            $this->db->prepare("delete from categories where id =(:id)");
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                $result = true;
            }
            return $result;

        }


        //sửa 1 loại theo id và tất cả các trường còn lại
        public function editCategoryById($data){
            
            $result = false;
            $this->db->prepare("update categories set name=(:name),image=(:image),link_name=(:link_name) where id=(:id)");
            $this->db->bindValue(':id',$data['id'],'int');
            $this->db->bindValue(':name',$data['name'],'string');
            $this->db->bindValue(':image',$data['image'],'string');
            $this->db->bindValue(':link_name',$data['link_name'],'string');
            if($this->db->execute()){
                $result = true;
            }
            return $result;
        }
    }

   
?>