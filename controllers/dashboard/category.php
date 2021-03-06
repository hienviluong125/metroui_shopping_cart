<?php
    class category extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('categories');
        }

        public function show($page){
           
            $categories = $this->model->getAllCategories($page);
            $data = [
                'categories' => $categories['categories'],
                'page' =>  $categories['page'],
                'lastPageNumber' =>  $categories['lastPageNumber']
            ];
            $this->renderView('category/show',$data,'dashboard');
        }

        public function add($page){
            $data = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                header('Location: '. ROOTURL . '/dashboard/category/show/' . $page);
            }else{
                $this->renderView('category/add',$data,'dashboard');
            }
            
        }

       

        public function edit($id,$page){
            $data = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $link_name = utf8_to_url($name);
                $image = $_POST['oldImage'];
               
                if(isset($_FILES['image']['name']) && $_FILES['image']['size'] > 0){
                    $image = $_FILES['image']['name'];
                    $sourcePath = $_FILES['image']['tmp_name'];      
                    $targetPath = "public/img/".$image; 
                    if(!file_exists('public/img/' . $image)){
                        move_uploaded_file($sourcePath,$targetPath);
                    }
                }

                $data = [
                    'name' => $name,
                    'image' => $image,
                    'link_name'=>$link_name
                ];
                $queryResult = $this->model->editCategoryById($id,$data);
                header('Location: '. ROOTURL . '/dashboard/category/show/' . $page);
            }
            else{
                $editItem = $this->model->getCategoryById($id);
                $data['editItem'] = $editItem;
                $this->renderView('category/edit',$data,'dashboard');
            }
        }

        public function delete($id){
            $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
            $result = $this->model->deleteCategoryById($id);
            header('Location:'. $referer);
        }


      
       
    }

  