<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('categories');
        }

       public function index(){
            $data = [];
         
           $this->renderView('category/index',$data,'dashboard');
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/category/index' );
       }
       
    }