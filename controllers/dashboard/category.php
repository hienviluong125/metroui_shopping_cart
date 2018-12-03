<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
        }

       public function index(){
           $this->renderView('dashboard/category/index','dashboard');
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/category/index' );
       }
       
    }