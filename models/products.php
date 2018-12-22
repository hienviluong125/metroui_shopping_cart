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

        public function getProductsImageList($link_name){
            $query = 
            "select * from products_images pi, products p
             where pi.product_id = p.id
             and p.link_name = :link_name";
             $this->db->prepare($query);
             $this->db->bindValue(':link_name',$link_name,'string');
             if($this->db->execute()){
                 return $this->db->fetchAll();
             }
             else{
                 return [];
             }
        }

        public function updateProductView($link_name){
            $query = "update products set views = views + 1 where link_name = :link_name";
            $this->db->prepare($query);
            $this->db->bindValue(':link_name',$link_name,'string');
            $this->db->execute();
        }

        public function getDetailProductByLinkName($link_name){
            $query = 
                "select p.*,c.name as cateName, b.name as brandName from products p ,categories c ,brands b
                 where p.category = c.id and p.brand = b.id
                 and p.link_name = :link_name";     
            $this->db->prepare($query);
            $this->db->bindValue(':link_name',$link_name,'string');
            if($this->db->execute()){
                $productDetail = $this->db->fetchOne();
                $sameCateProducts = $this->getSameCateProducts($productDetail->id,$productDetail->category);
                $sameBrandProducts = $this->getSameBrandProducts($productDetail->id,$productDetail->brand);
                return [
                    'productDetail' => $productDetail,  
                    'sameCateProduct' => $sameCateProducts, 
                    'sameBrandProduct' => $sameBrandProducts,
                ];
            }
            else{
                return [];
            }
        }

        public function getSameCateProducts($productId,$cateId){
            //expect 1 product
            $query = "select * from products p where p.category = :cateId and p.id != :productId order by rand() limit 10";  
            $this->db->prepare($query);
            $this->db->bindValue(':cateId',$cateId,'int');
            $this->db->bindValue(':productId',$productId,'int');

            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }

        public function getSameBrandProducts($productId,$brandId){
            //expect 1 product
            $query = "select * from products p where p.brand = :brandId and p.id != :productId order by rand() limit 10";  
            $this->db->prepare($query);
            $this->db->bindValue(':brandId',$brandId,'int');
            $this->db->bindValue(':productId',$productId,'int');
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }

        public function getProductByCateName($cateName,$number){
            $query = "select p.* from products p,categories c
                        where p.category = c.id and c.name = :cateName
                        limit :number
                    ";     
            $this->db->prepare($query);
            $this->db->bindValue(':cateName',$cateName,'string');
            $this->db->bindValue(':number',$number,'int');
            if($this->db->execute()){
                return $this->db->fetchAll();
            }else{
                return [];
            }
        }
        





    }
?>