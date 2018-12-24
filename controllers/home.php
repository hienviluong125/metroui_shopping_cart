<?php
    class home extends BaseController {
        private $productModel;
        private $categoryModel;
        private $brandModel;
        public function __construct(){
            $this->productModel = $this->initModel('products');
            $this->categoryModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
        }

        public function index(){
            $data = [
                'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                'headPhones' => $this->productModel->getProductByCateName('Tai nghe',12),
                'keyBoards' => $this->productModel->getProductByCateName('Bàn phím',12),
                'mouses' => $this->productModel->getProductByCateName('Chuột',12),
                'latestProducts' =>  $this->productModel->getLatestProducts(10),
                'topViewsProducts' =>$this->productModel->getTopViewsProducts(10),
                'hotSellingProducts'=>$this->productModel->getHotSellingProducts(10)
            ];
           $this->renderView('home/index',$data);
        }

 
    }
