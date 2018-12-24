<?php

    class brands {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

          //
          public function addNewBrand($data){
            $this->db->prepare(" insert into brands (name,image,link_name) values (:name,:image,:link_name)");
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

        public function getLastPageNumber($rowPersPage){
            $query = "select count(id) as number from brands";
            $this->db->prepare($query);
            if($this->db->execute()){
                $number = $this->db->fetchOne()->number;
                return ceil($number / $rowPersPage);
            }else{
                return 0;
            }
        }

        public function deleteBrandById($id){
            $result = false;
            $this->db->prepare("delete from brands where id =(:id)");
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                $result = true;
            }
            return $result;

        }

        public function getBrandById($id){
            $result = '';
            $this->db->prepare("select b.id,b.name,b.link_name,b.image  from brands b where id =(:id)");
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                $result = $this->db->fetchOne();
            }
            return $result;
        }

        public function editBrandById($id,$data){
            
            $result = false;
            $this->db->prepare("update brands set name=(:name),image=(:image),link_name=(:link_name) where id=(:id)");
            $this->db->bindValue(':id',$id,'int');
            $this->db->bindValue(':name',$data['name'],'string');
            $this->db->bindValue(':image',$data['image'],'string');
            $this->db->bindValue(':link_name',$data['link_name'],'string');
            if($this->db->execute()){
                $result = true;
            }
            return $result;
        }

        public function getAllBrands($page){
           
            if($page == 0){
                $query = "select * from brands";
            }else{
                $query = "select * from brands order by id desc limit 7 offset :offset ";
            }

            $rowPersPage = 7;
            $count = 0;
            $lastPageNumber = $this->getLastPageNumber($rowPersPage);
            $offset = ($page-1) * $rowPersPage;
            $result = [];
            
            
            $this->db->prepare($query);
            $this->db->bindValue(':offset',$offset,'int');
            if($this->db->execute()){
                $brands = $this->db->fetchAll();
                $count = '';
                return [
                    'brands' => $brands,
                    'page' => $page,
                    'lastPageNumber' => $lastPageNumber
                ];
            }else{
                return [];
            }
        }
    }
   
?>