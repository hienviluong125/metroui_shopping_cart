<?php
    class products {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        public function deleteProductById($id){
            $result = false;
            $this->db->prepare("delete from products where id =(:id)");
            $this->db->bindValue(':id',$id,'int');
            if($this->db->execute()){
                $result = true;
            }
            return $result;
        }

        public function getAllProducts($page){
            $rowPersPage = 7;
            $count = 0;
            $offset = ($page-1) * $rowPersPage;
            $limit = ($page * $rowPersPage) - 1; 
            $result = [];
            
            $query = 
                "select p.id as id ,
                    p.name as name,
                    p.image as image,
                    p.price as price,
                    c.name as category,
                    b.name as brand,
                    p.views,
                    p.quantity,
                    p.origin

                from products as p 
                    inner join categories  as c on p.category = c.id
                    inner join brands as b on p.brand = b.id
                ";

            $this->db->prepare($query);
            if($this->db->execute()){
                $result = $this->db->fetchAll();
                if($page != 0){
                    $nRows = count($result);
                    $count = ceil($nRows / $rowPersPage);
                    $result = array_slice($result, $offset, $limit+1); 
                }
            }
            return [
                'products' => $result,
                'count' => $count
            ];
           // return"hello";
        }

        public function getLatestProducts($number){
            $result = [];
            $query = "select * from products order by created_date  desc  limit :number";
            $this->db->prepare($query);
            $this->db->bindValue(':number',$number,'int');
            if($this->db->execute()){
                $result =$this->db->fetchAll();
                return $result;
            }
        }

        public function getTopViewsProducts($number){
            $result = [];
            $query = "select * from products order by views desc  limit :number";
            $this->db->prepare($query);
            $this->db->bindValue(':number',$number,'int');
            if($this->db->execute()){
                $result =$this->db->fetchAll();
                return $result;
            }
        }
       
        public function getHotSellingProducts($number){
            $result = [];
            $query = "select * from products order by quantity desc limit :number";
            $this->db->prepare($query);
            $this->db->bindValue(':number',$number,'int');
            if($this->db->execute()){
                $result =$this->db->fetchAll();
                return $result;
            }
        }

        public function getProductDetailById(){
          
        }

        public function getProductByCateLinkname($link_name,$page){
            $offset = ($page-1)*12;
            $limit = 12;
            $result = [];
            $query = 
                "select p.*,c.name as currentCate from products p, categories c
                where p.category = c.id and c.link_name = :link_name
                limit :limit offset :offset";
            $this->db->prepare($query);
            $this->db->bindValue(':link_name',$link_name,'string');
            $this->db->bindValue(':limit',$limit,'int');
            $this->db->bindValue(':offset',$offset,'int');
            if($this->db->execute()){
                $result =$this->db->fetchAll();
                return [
                    'products'=>$result,
                    'current'=>$result[0]->currentCate
                ];
            }
        }

        public function getProductByBrandLinkname($link_name,$page){
            $offset = ($page-1)*12;
            $limit = 12;
            $result = [];
            $query = 
                "select p.*,b.name as currentBrand from products p, brands b
                where p.brand = b.id and b.link_name = :link_name
                limit :limit offset :offset";
            $this->db->prepare($query);
            $this->db->bindValue(':link_name',$link_name,'string');
            $this->db->bindValue(':limit',$limit,'int');
            $this->db->bindValue(':offset',$offset,'int');
            if($this->db->execute()){
                $result =$this->db->fetchAll();
                return [
                    'products'=>$result,
                    'current'=>$result[0]->currentBrand
                ];
            }
        }





    }
?>