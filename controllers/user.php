<?php
    class user extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('users');
        }

        // đường dẫn con register
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $user = [
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'passwordConfirm' => $_POST['passwordConfirm'],
                    'fullname' => $_POST['fullname'],
                    'email' => $_POST['email']
                ];

                $isSuccess = $this->model->register($user);
                if($isSuccess){
                    createSession('flash','Đăng ký thành công');
                    header('Location: '.'login');
                }else{
                    createSession('flash','Đăng ký thất bại');
                    header('Location: '.'register');
                }
            }else{
                $data = [];
                $this->renderView('user/register',$data);
            }
           
        }

        //đường dẫn con login
        public function login(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = [
                    'username' => $_POST['username'],
                    'password' => $_POST['password']

                ];
                $loginResult = $this->model->login($user);
                if($loginResult == -1){
                    createSession('flash','Username không tồn tại');
                    header('Location: '.'login');
                }else if($loginResult == 0){
                    createSession('flash','Password không đúng');
                    header('Location: '.'login');
                }else{
                    createSession('flash','Đăng nhập thành công');
                    header('Location: '. ROOTURL . '/home');

                }
            }else{
            $data = [];
            $this->renderView('user/login',$data);
        }
    }

    public function logout(){
        clearAllSession();
        header('Location: '. ROOTURL . '/user/login');
    }
}
