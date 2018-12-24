<?php
    class product extends BaseController {
        private $model;
        public function __construct(){
            authorization();
            $this->model = $this->initModel('products');
            $this->cateModel = $this->initModel('categories');
            $this->brandModel = $this->initModel('brands');
        }

        public function show($page){
            $productObj = $this->model->getAllProducts($page);
            $data = [
                'products' => $productObj['products'],
                'page' => $productObj['page'],
                'lastPageNumber'=> $productObj['lastPageNumber']
            ];
            $this->renderView('product/show',$data,'dashboard');
        }

        public function add($page){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $image = $_FILES['image']['name'];
                if(isset($_FILES['image']['name'])){
                    $sourcePath = $_FILES['image']['tmp_name'];      
                    $targetPath = "public/img/".$image; 
                   
                }

                $product = [
                    'name' => $_POST['name'],
                    'link_name' => utf8_to_url($_POST['name']),
                    'image' => $image,
                    'price' => $_POST['price'],
                    'category'=> $_POST['category'],
                    'brand'=> $_POST['brand'],
                    'quantity'=> $_POST['quantity'],
                    'origin'=> $_POST['origin'],
                    'description'=> $_POST['description']
                ];

                if(file_exists('public/img/' . $image)){
                    $queryResult = $this->model->addProduct($product);
                }
                else{
                    if(move_uploaded_file($sourcePath,$targetPath)){
                        $queryResult = $this->model->addProduct($product);
                    }
                }
                header('Location:'. ROOTURL . '/dashboard/product/show/' . $page);
            }else{
                $data = [
                    'categories' => $this->cateModel->getAllCategories(1)['categories'],
                    'brands' => $this->brandModel->getAllBrands(1)['brands']
                ];
                $this->renderView('product/add',$data,'dashboard');
            }
        }

        public function edit($link_name,$page){
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

                $product = [
                    'name' => $_POST['name'],
                    'link_name' => utf8_to_url($_POST['name']),
                    'image' => $image,
                    'price' => $_POST['price'],
                    'category'=> $_POST['category'],
                    'brand'=> $_POST['brand'],
                    'quantity'=> $_POST['quantity'],
                    'origin'=> $_POST['origin'],
                    'description'=> $_POST['description']
                ];

                $queryResult = $this->model->editProductById($_POST['id'],$product);
                header('Location:'. ROOTURL . '/dashboard/product/show/' . $page);


            }else{
                $product = $this->model->getDetailProductByLinkName($link_name);
                $data=[
                    'product' => $product['productDetail'],
                    'categories' => $this->cateModel->getAllCategories(1)['categories'],
                    'brands' => $this->brandModel->getAllBrands(1)['brands']
                ];
                $this->renderView('product/edit',$data,'dashboard');
            }
        }

        public function delete($id){
            $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
            $result = $this->model->deleteProductById($id);
            header('Location:'. $referer);
        }
    }