<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
            $this->categoryModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
            
        }

        

        public function show($field,$link_name,$page){
            if($field == 'category'){
                $result = $this->model->getProductByCateLinkname($link_name,$page);
                $data = [
                    'allCategories' => $this->categoryModel->getAllCategories(0),
                    'allBrands' => $this->brandModel->getAllBrands(0),
                    'area'=>'Trang chủ / Sản phẩm / Loại / ',
                    'showWith'=>$field,
                    'products' => $result['products'],
                    'current'=>$result['current']
                ];
                $this->renderview('product/list',$data);
            }
            else if($field =='brand'){
                $result = $this->model->getProductByBrandLinkname($link_name,$page);
                $data = [
                    'allCategories' => $this->categoryModel->getAllCategories(0),
                    'allBrands' => $this->brandModel->getAllBrands(0),
                    'area'=>'Trang chủ / Sản phẩm / Nhà sản xuất / ',
                    'showWith'=>$field,
                    'products' => $result['products'],
                    'current'=>$result['current']
                ];
                $this->renderview('product/list',$data);
            }
        }

        public function detail($link_name){
            $this->model->updateProductView($link_name);
            $productDetail = $this->model->getDetailProductByLinkName($link_name);
            $productImageList = $this->model->getProductsImageList($link_name);
            $data = [
                'allCategories' => $this->categoryModel->getAllCategories(0),
                'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                'product'=> $productDetail,
                'imageList' =>  $productImageList 
            ];
            $this->renderview('product/detail',$data);
        }

        
        
    }
