<?php
    class main{
        private $currentController; // controller hiện tại
        private $currentMethod; // function - method - đường dẫn con hiện tại
        private $params; // tham số cho controller
        public function __construct(){

            $url = $this->getUrl();
            $siteType = '';
            if($url[0] == 'dashboard'){
                array_splice($url,0,1);
                $siteType = 'dashboard';
            }


            //khi nhập url là /user/login
            // -> 'controllers/user.php
            if(file_exists('controllers/' . $siteType . '/' .$url[0] . '.php' )){
                //kiểm tra controller có tồn tại hay ko ?
                //gọi thư viện để đi vào controller
               require_once('controllers/' . $siteType . '/' . $url[0] . '.php' );
               //gán controller hiện tại vào controller giống đường dẫn
               $this->currentController = new $url[0];
               // xóa phần tử mảng url đầu tiên, xử lý url tiếp theo
               array_splice($url,0,1);
            }
            
            if(method_exists($this->currentController,$url[0])){
                //kiểm tra 1 cái hàm có tồn tại trong 1 biến kiểu Class hay ko ?
                $this->currentMethod = $url[0];
                array_splice($url,0,1);
            }
            //count: đếm số lượng phần tử mảng
           if(count($url) > 0){
                $this->params = $url;
           }
           else{
                $this->params = [];
           }
            
            //vì phương thức là 1 string
            //gọi hàm
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