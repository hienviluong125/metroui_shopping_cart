<?php
    class user extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('users');
        }

        public function show(){
            $data = ['users'=> $this->model->getAllUsers()];
           
            $this->renderView('user/show',$data,'dashboard');
        }
    }
