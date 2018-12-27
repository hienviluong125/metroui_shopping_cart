<?php
    class user extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('users');
            $this->cateModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
            $this->orderModel = $this->initModel('orders');
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
                $isExist = $this->model->getInfoUser($data['username']);
                if(!empty($isExist)){
                    $flash = ['type'=>'error','content'=>'Tài khoản đã tồn tại'];
                    createSession('flash',$flash);
                    $this->renderView('user/register',$data);
                }else{
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
                }
             
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
                    $userInfo = $this->model->getInfoUser($user['username']);
                    $userStorage = [
                        'username'=>$userInfo->username,
                        'role'=>$userInfo->role,
                        'avatar' => $userInfo->avatar
                    ];
                    clearSession('user');
                    createSession('user',$userStorage);
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

        public function changepassword(){
            $user = getSession('user');
            if(!isset($user) || empty($user)){
                $flash = ['type'=>'error','content'=>'Bạn cần đăng nhập trước khi vào trang này'];
                createSession('flash',$flash);
                header('Location: '. ROOTURL . '/user/login');
            }else{
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $userData = [
                        'currentpassword' => md5($_POST['currentpassword']),
                        'newpassword' => md5($_POST['newpassword']),
                        'newpasswordConfirm' => md5($_POST['newpasswordConfirm']),
                    ];
                    
                    $currentPassword = $this->model->getInfoUser($user['username'])->password;
                    if($currentPassword === $userData['currentpassword']){
                        $isSuccess =  $this->model->changePasswordByUsername($user['username'],$userData['newpassword']);
                        if($isSuccess){
                            $flash = ['type'=>'success','content'=>'Thay đổi mật khẩu thành công'];
                            createSession('flash',$flash);
                            header('Location: '. ROOTURL . '/user/profile');
                        }else{
                            $flash = ['type'=>'error','content'=>'Thay đổi mật khẩu thất bại'];
                            createSession('flash',$flash);
                            header('Location: '. ROOTURL . '/user/changepassword');
                        }
                     
                    }else{
                        $flash = ['type'=>'error','content'=>'Mật khẩu cũ không chính xác'];
                        createSession('flash',$flash);
                        header('Location: '. ROOTURL . '/user/changepassword');
                    }

                }else{
                    $data = [
                        'user' =>  $this->model->getInfoUser($user['username']),
                        'allCategories' => $this->cateModel->getAllCategories(0)['categories'],
                        'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                    ];
                   
                    $this->renderView('user/changepassword',$data);
                }
                
            }
        }

        public function profile(){
            $user = getSession('user');
            if(!isset($user) || empty($user)){
                $flash = ['type'=>'error','content'=>'Bạn cần đăng nhập trước khi vào trang này'];
                createSession('flash',$flash);
                header('Location: '. ROOTURL . '/user/login');
            }else{
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $userData = [
                        'fullname' => $_POST['fullname'],
                        'email' => $_POST['email'],
                        'phone' => $_POST['phone'],
                        'address' => $_POST['address'],
                        'avatar' =>$_POST['oldImage']
                    ];
                  
        
                    if(isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0){
                        $image = $_FILES['image']['name'];
                        $sourcePath = $_FILES['image']['tmp_name'];      
                        $targetPath = "public/img/".$image; 
                        if(!file_exists('public/img/' . $image)){
                            move_uploaded_file($sourcePath,$targetPath);
                        }
                        $userData['avatar'] = $image;
                    }

                    $isSuccess = $this->model->updateInfoByUsername($user['username'], $userData);
                    if($isSuccess){
                        $userInfo = $this->model->getInfoUser($user['username']);
                        $userStorage = [
                            'username'=>$userInfo->username,
                            'role'=>$userInfo->role,
                            'avatar' => $userInfo->avatar
                        ];
                        $flash = ['type'=>'success','content'=>'Cập nhật thành công'];
                        clearSession('user');
                        createSession('user',$userStorage);
                        createSession('flash',$flash);
                    }else{
                        $flash = ['type'=>'error','content'=>'Cập nhật thất bại'];
                        createSession('flash',$flash);
                    }
                    header('Location: '. ROOTURL . '/user/profile');
                }else{
                    $data = [
                        'user' =>  $this->model->getInfoUser($user['username']),
                        'allCategories' => $this->cateModel->getAllCategories(0)['categories'],
                        'allBrands' => $this->brandModel->getAllBrands(0)['brands'],
                    ];
                    $this->renderView('user/profile',$data);
                }
                
            }
        }

        public function orders(){
            $user = getSession('user');
            if(!isset($user) || empty($user)){
                $flash = ['type'=>'error','content'=>'Bạn cần đăng nhập trước khi vào trang này'];
                createSession('flash',$flash);
                header('Location: '. ROOTURL . '/user/login');
            }else{
                $orders = $this->orderModel->getOrdersOfUser($user['username']);
                $orderArr = [];
                foreach($orders as $o){
                    $orderItem = [
                        'id' => $o->id,
                        'price' => $o->price,
                        'createddate' => $o->createddate,
                        'status' => $o->status,
                        'delivereddate' => $o->delivereddate,
                        'details' => $this->orderModel->getOrderDetail($o->id)
                    ];
                    $orderArr[] = $orderItem;
                }
                $data = [
                    'orders' =>  $orderArr
                ];
                $this->renderView('user/orders',$data);
            }
        }
}
