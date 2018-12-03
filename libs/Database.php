<?php
    function vcl(){
        return'vcl';
    }
    class Database {
        protected $conn;
        protected $stmt;
        public function __construct(){

            $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';';
            // Set options
            $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            // Create a new PDO instanace
            try {
                $this->conn = new PDO($dsn, USER, PASSWORD, $options);
            }
            // Catch any errors
            catch (PDOException $e) {
                echo $e->getMessage();
                echo("Lỡi");
                exit();
            }
        }

        public function prepare($query){
            $this->stmt = $this->conn->prepare($query);
        }
        
        public function execute(){
            return $this->stmt->execute();
        }

        public function fetchAll(){
            $result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        }

        public function fethOne(){
            $this->stmt->execute();
            $result = $this->stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        }

        public function bindValue($placeholder, $value){
            $this->stmt->bindValue($placeholder, $value);
        }
       
        public function lastInsertId(){
            return $this->conn->lastInsertId();
        }

      
    }

?>