<?php
    class main{
        private $currentController; // controller hiện tại
        private $currentMethod; // function - method - đường dẫn con hiện tại
        private $params; // tham số cho controller
        public function __construct(){

            $this->currentMethod = 'index';

            $url = $this->getUrl();
            $siteType = '';
            
            if($url[0] == 'dashboard'){
               // authentication();
                array_splice($url,0,1);
                $siteType = 'dashboard';
            }
            
            if(file_exists('controllers/' . $siteType . '/' .$url[0] . '.php' )){
               require_once('controllers/' . $siteType . '/' . $url[0] . '.php' );
               $this->currentController = new $url[0];
               array_splice($url,0,1);
            }else{
                echo ("Error");
                exit();
            }
            
            if(isset($url[0])){
                $this->currentMethod = $url[0];
                if(method_exists($this->currentController,$this->currentMethod)){
                    array_splice($url,0,1);
                }else{
                    echo ("Error");
                    exit();
                }
               
            }
        
    
           if(count($url) > 0){
                $this->params = $url;
           }
           else{
                $this->params = [];
           }

            call_user_func_array(
                [$this->currentController,$this->currentMethod],
                $this->params
            );
        }


        public function getUrl(){
            $url = $_GET['url'];
            $url = rtrim($url,'/');
            //right trim - xóa những ký tự thừa từ bên phải cùng
            $url = explode('/',$url);
            return $url;
        }
    }

?>