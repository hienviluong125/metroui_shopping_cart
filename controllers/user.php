<?php
    class user extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('users');
        }

        // đường dẫn con register
        public function register(){
            // $param = [];
            // //POST case
            // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //     $param = [
            //         'username' => $_POST['username'],
            //         'password' => $_POST['password'],
            //         'email' => $_POST['email'],
            //         'fullname' => $_POST['fullname']
            //     ];
            //    $this->model->register($param);
        
            //    // $this->renderView('user/register',$param);
            // }
            // else{
            //     $this->renderView('user/register',$param);
            // }
            // //GET case
            $data = [];
            $this->renderView('user/register',$data);
        }

        //đường dẫn con login
        public function login(){
            $data = [];
            $this->renderView('user/login',$data);
        }
    }
