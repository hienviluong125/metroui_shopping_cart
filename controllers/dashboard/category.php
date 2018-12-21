<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('categories');
        }

       public function index($page){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               if(isset($_POST['add'])){
                $name = $_POST['name'];
                $image=$_FILES['image']['name'];
                $link_name = utf8_to_url($name);
            
                if(strlen($name)> 0  && strlen($image)>0){
                    $sourcePath = $_FILES['image']['tmp_name'];      
                    $targetPath = "public/img/".$image; 
                    $data = [
                        'name' => $name,
                        'image' => $image,
                        'link_name'=>$link_name
                    ];
                
                    if(file_exists('public/img/' . $image)){
                       $queryResult = $this->model->addNewCategory($data);
                    }
                    else{
                        if(move_uploaded_file($sourcePath,$targetPath)){
                            $queryResult = $this->model->addNewCategory($data);
                        }
                    }
                }
               }
               else if(isset($_POST['edit'])){
                    echo("editing");
               }
            }
           
            $data = [
                'categories' => $this->model->getAllCategories($page),
                'page' => $page
            ];
            $this->renderView('category/index',$data,'dashboard');
            
           
       }

      
       
    }

  