<?php

    class brands {
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        public function getAllBrands($page){
            $rowPersPage = 7;
            $count = 0;
            $offset = ($page-1) * $rowPersPage;
            $limit = ($page * $rowPersPage) - 1; 
            $result = [];
            
            $this->db->prepare("select * from brands order by id desc");
            if($this->db->execute()){
                $result = $this->db->fetchAll();
                if($page != 0){
                    $nRows = count($result);
                    $count = ceil($nRows / $rowPersPage);
                    $result = array_slice($result, $offset, $limit+1); 
                }
            }
            return [
                'brands' => $result,
                'count' => $count
            ];
        }
    }
   
?>