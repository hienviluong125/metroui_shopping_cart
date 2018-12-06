<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('categories');
        }

       public function index($page){
            $result = $this->model->getAllCategories(0);
           
            $data = [
               'categories' => $result['categories'],
               'page'=>$page,
               'count'=>$result['count']
           ];
           $this->renderView('dashboard/category/index','dashboard',$data);
       }

       public function defaultRedirect(){
          header('Location: '. ROOTURL . '/dashboard/category/index' );
       }
       
    }