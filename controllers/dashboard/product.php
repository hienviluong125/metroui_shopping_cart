<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            $this->model = $this->initModel('products');
        }

        public function productList(){
            $this->renderView('dashboard/product/list');
        }

        public function add(){
            $this->renderView('dashboard/product/add');
        }

        public function delete(){
            $this->renderView('dashboard/product/delete');
        }

        public function edit(){
            $this->renderView('dashboard/product/edit');
        }
       
    }