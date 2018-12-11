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
            //map with list

        }





    }
?>