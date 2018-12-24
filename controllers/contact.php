<?php
    class contact extends BaseController {
        public function __construct(){
           
        }

        public function index(){
            $data =[];
            $this->renderView('contact/index',$data);
        }

        
}
