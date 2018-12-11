<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
        }

        public function index(){
            $data = [];
         
           $this->renderView('product/index',$data,'dashboard');
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/product/index/1' );
       }
    }