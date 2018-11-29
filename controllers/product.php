<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
        }

        public function productList(){
            $data = [
                'products' => $this->model->getAllProducts()
            ];
            $this->renderview('product/list',$data);
        }
        //xem tất cả sản phẩm thuộc loại sản phẩm ?
        public function cate($cateName){
            echo("Coi tất cả sản phẩm của " . $cateName);
        }

         //xem tất cả sản phẩm thuộc nhà sản xuất ( hiệu ) ?
         public function brand($brandName){        
            $data = [
                'products' => $this->model->getAllProducts()
            ];
            
           $this->renderView('products',$data);
    
         }

    }
