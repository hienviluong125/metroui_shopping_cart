<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('categories');
        }

       public function index(){
            $data = [];
           $this->renderView('dashboard/category/index','dashboard',$data);
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/category/index' );
       }
       
    }