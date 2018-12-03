<?php
    class products {
        private $Provider;
        
        public function __construct(){
            $this->Provider = new Database();
        }

        public function getAllProducts(){
            $this->Provider->prepare('select * from products');
            $this->Provider->execute();
            $result = $this->Provider->fetchAll();
            return $result;
        }

        public function test(){
            return 'xyz';
        }

    }
?>