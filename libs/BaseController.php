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
        public function renderView($view,$layout = '',$data = []){
            if(file_exists('views/' . $view . '.php')){
                require_once('views/' . $layout . '/layout/header.php');
                require_once('views/' . $view . '.php');
                require_once('views/' . $layout . '/layout/footer.php');
            }else{
                echo("Không tồn tại trang");
            }
        }
    }
?>