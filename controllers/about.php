<?php
    class about extends BaseController {
        public function __construct(){
           
        }

        public function index(){
            $data =[];
            $this->renderView('about/index',$data);
        }

        
}
