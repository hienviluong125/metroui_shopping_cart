<?php
    class brand extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('brands');
        }

        public function show($page){
           
            $brands = $this->model->getAllBrands($page);
            $data = [
                'brands' => $brands['brands'],
                'page' =>  $brands['page'],
                'lastPageNumber' =>  $brands['lastPageNumber']
            ];
            $this->renderView('brand/show',$data,'dashboard');
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
                        $queryResult = $this->model->addNewBrand($data);
                    }
                    else{
                        if(move_uploaded_file($sourcePath,$targetPath)){
                            $queryResult = $this->model->addNewBrand($data);
                        }
                    }
                }
                header('Location: '. ROOTURL . '/dashboard/brand/show/' . $page);
            }else{
                $this->renderView('brand/add',$data,'dashboard');
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
                $queryResult = $this->model->editBrandById($id,$data);
                header('Location: '. ROOTURL . '/dashboard/brand/show/' . $page);
            }
            else{
                $editItem = $this->model->getBrandById($id);
                $data['editItem'] = $editItem;
                $this->renderView('brand/edit',$data,'dashboard');
            }
        }


        public function delete($id){
            $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
            $result = $this->model->deleteBrandById($id);
            header('Location:'. $referer);
        }



      
       
    }

  