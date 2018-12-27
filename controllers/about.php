<?php
    class about extends BaseController {
        public function __construct(){
            $this->categoryModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
        }

        public function index(){
            $data =[
                'allCategories' => $this->categoryModel->getAllCategories(0)['categories'],
                'allBrands' => $this->brandModel->getAllBrands(0)['brands']
            ];
            $this->renderView('about/index',$data);
        }

        
}
