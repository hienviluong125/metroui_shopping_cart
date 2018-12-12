<?php
    class BaseController{
        //tạo model
        public function initModel($modelName){
            if(file_exists('models/' . $modelName . '.php')){
                require_once('models/' . $modelName . '.php');
                return new $modelName;
            }else{
                return null;
            }
        }

        //tạo views
        //áp dụng header đặc biệt cho login, register
        public function renderView($view,$data = [],$layout = 'client'){
          
            
            if(file_exists('views/' . $layout .'/' . $view . '.php')){
                !$this->isLoginRegisterView($view) 
                ? require_once('views/' . $layout . '/layout/header.php')
                : require_once('views/' . $layout . '/layout/login_register_header.php');
                require_once('views/'  . $layout .'/' . $view . '.php');
                // require_once('views/' . $layout . '/layout/footer.php');
            }else{
                echo("Không tồn tại trang");
            }
        }

        public function isLoginRegisterView($view){
            if(strpos($view,'login') || strpos($view,'register')){
                return true;
            }
            return false;
        }

    }
?>