<?php

    class categories {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        //thêm loại sản phẩm
        public function addNewCategory($data){
            $this->db->prepare(" insert into categories (name,image,link_name) values (:name,:image,:link_name)");
            $this->db->bindValue(':name',$data['name']);
            $this->db->bindValue(':image',$data['image']);
            $this->db->bindValue(':link_name',$data['link_name']);
            $result = [
                'isSuccess' => false,
                'lastInsertedId' => -1
            ];
            if($this->db->execute()){
                //thêm list hình tại đây
                $result['isSuccess'] = true;
                $result['lastInsertedId'] = $this->db->lastInsertId();
            }
            return $result;
        }

        //lấy 1 loại theo id
        public function getCategoryById($id){
            $result = '';
            $this->db->prepare("select c.id,c.name,c.link_name,c.image  from categories c where id =(:id)");
            $this->db->bindValue(':id',$id);
            if($this->db->execute()){
                $result = $this->db->fetchOne();
            }
            return $result;
        }

        //lấy tất cả loại
        public function getAllCategories($page){
            $rowPersPage = 7;
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
            return [
                'categories' => $result,
                'count' => $count
            ];
        }

        //xóa 1 loại theo id
        public function deleteCategoryById($id){
            $result = false;
            $this->db->prepare("delete from categories where id =(:id)");
            $this->db->bindValue(':id',$id);
            if($this->db->execute()){
                $result = true;
            }
            return $result;

        }


        //sửa 1 loại theo id và tất cả các trường còn lại

    }

   
?>