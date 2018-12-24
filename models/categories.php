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

            if($page == 0){
                $query = "select * from categories";
            }else{
                $query = "select * from categories order by id desc limit 7 offset :offset ";
            }

            $rowPersPage = 7;
            $count = 0;
            $lastPageNumber = $this->getLastPageNumber($rowPersPage);
            $offset = ($page-1) * $rowPersPage;
            $result = [];
            
            
            $this->db->prepare($query);
            $this->db->bindValue(':offset',$offset,'int');
            if($this->db->execute()){
                $categories = $this->db->fetchAll();
                $count = '';
                return [
                    'categories' => $categories,
                    'page' => $page,
                    'lastPageNumber' => $lastPageNumber
                ];
            }else{
                return [];
            }
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


        public function getLastPageNumber($rowPersPage){
            $query = "select count(id) as number from categories";
            $this->db->prepare($query);
            if($this->db->execute()){
                $number = $this->db->fetchOne()->number;
                return ceil($number / $rowPersPage);
            }else{
                return 0;
            }
        }

        //sửa 1 loại theo id và tất cả các trường còn lại
        public function editCategoryById($id,$data){
            
            $result = false;
            $this->db->prepare("update categories set name=(:name),image=(:image),link_name=(:link_name) where id=(:id)");
            $this->db->bindValue(':id',$id,'int');
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