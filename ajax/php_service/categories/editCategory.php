<?php

    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/categories.php');
    require('./../../../helpers/utf8_convert.php');

   $cateModel = new categories();

   $name = $_POST['name'];
   $image=$_FILES['image']['name'];
   $link_name = utf8_to_url($name);
  
   $result = [
    'isSuccess' => false
    ];
    $queryResult = '';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $image=$_FILES['image']['name'];
    $link_name = utf8_to_url($name);

    if(strlen($name)> 0  && strlen($image)>0){
    

        $sourcePath = $_FILES['image']['tmp_name'];      
        $targetPath = "./../../../public/img/".$image; 

        $data = [
            'id' => $id,
            'name' => $name,
            'image' => $image,
            'link_name'=>$link_name
        ];

        if(file_exists('./../../../public/img/' . $image)){
            $queryResult = $cateModel->editCategoryById($data);
        }
        else{
            if(move_uploaded_file($sourcePath,$targetPath)){
                $queryResult = $cateModel->editCategoryById($data);
            }
        }

        $result['isSuccess'] = $queryResult;
    }





echo(json_encode($result));
   

?>