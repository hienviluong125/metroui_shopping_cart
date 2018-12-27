<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
            $this->categoryModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
            
        }

        
        public function search($searchBy,$content){
            $data = [
                'products' => $this->model->search($searchBy,$content),
                'keyword' => $content
            ];
           $this->renderview('product/search',$data);

        }

        public function show($field,$link_name,$page){
            if($field == 'category'){
                $result = $this->model->getProductByCateLinkname($link_name,$page);
                $lastPageNumber = $this->model->getLastPageNumberProductWithCateBrand('cate',$link_name,12);
                $data = [
                    'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                    'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                    'area'=>'Trang chủ / Sản phẩm / Loại / ',
                    'showWith'=>$field,
                    'products' => $result['products'],
                    'current'=>$result['current'],
                    'lastPageNumber'=> $lastPageNumber,
                    'page' => $page,
                    'linkto' => $field . '/' . $link_name
                ];
                $this->renderview('product/list',$data);
            }
            else if($field =='brand'){
                $result = $this->model->getProductByBrandLinkname($link_name,$page);
                $lastPageNumber = $this->model->getLastPageNumberProductWithCateBrand('brand',$link_name,12);
                $data = [
                    'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                    'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                    'area'=>'Trang chủ / Sản phẩm / Nhà sản xuất / ',
                    'showWith'=>$field,
                    'products' => $result['products'],
                    'current'=>$result['current'],
                    'lastPageNumber'=> $lastPageNumber,
                    'page' => $page,
                    'linkto' => $field . '/' . $link_name
                ];
                $this->renderview('product/list',$data);
            }
        }

        public function detail($link_name){
            $this->model->updateProductView($link_name);
            $productDetail = $this->model->getDetailProductByLinkName($link_name);
            $productImageList = $this->model->getProductsImageList($link_name);
            $data = [
                'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                'product'=> $productDetail,
                'imageList' =>  $productImageList ,
                'area'=>'Trang chủ / Sản phẩm / ',
                'latestProducts' =>  $this->model->getLatestProducts(10),
            ];
            $this->renderview('product/detail',$data);
        }

        
        
    }
