<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
        }

       public function index($page){
         
           
            $data = [
             
           ];
           $this->renderView('dashboard/product/index','dashboard',$data);
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/product/index/1' );
       }
    }