<?php
    class products {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
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
                    p.status

                from products as p 
                    inner join categories  as c on p.category = c.id
                    inner join brands as b on p.brand = b.id
                where p.id=3
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
        }

        public function getProductDetailById(){
            //map with list

        }





    }
?>