<?php
    class user extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('users');
        }

        // đường dẫn con register
        public function register(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $data = [
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'passwordConfirm' => $_POST['passwordConfirm'],
                    'fullname' => $_POST['fullname'],
                    'email' => $_POST['email']
                ];
                $captcha="";
                if(isset($_POST['g-recaptcha-response'])){
                    $captcha = $_POST['g-recaptcha-response'];
                 }
                 if(!$captcha){
                     echo("Nhập captcha dzo");
                 }
                // $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfBIYMUAAAAAI_UvAITNvk04QLq87aZl_a5q2T-&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                // if($response.success){
                    $isSuccess = $this->model->register($data);
                    if($isSuccess){
                        $flash = ['type'=>'success','content'=>'Đăng ký thành công'];
                        createSession('flash',$flash);
                        header('Location: '.'login');
                    }else{
                        $flash = ['type'=>'error','content'=>'Đăng ký thất bại'];
                        createSession('flash',$flash);
                        $this->renderView('user/register',$data);
                    }
                // }
              
            }else{
                $data = [
                    'username' => '',
                    'password' => '',
                    'passwordConfirm' => '',
                    'fullname' =>'',
                    'email' =>''
                ];
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
                    $flash = ['type'=>'error','content'=>'Username không tồn tại'];
                    createSession('flash',$flash);
                    header('Location: '.'login');
                }else if($loginResult == 0){
                    $flash = ['type'=>'error','content'=>'Password không đúng'];
                    createSession('flash',$flash);
                    header('Location: '.'login');
                }else{
                    $flash = ['type'=>'success','content'=>'Đăng nhập thành công'];
                    createSession('flash',$flash);
                   // createSession()
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

    public function profile(){

    }
}
