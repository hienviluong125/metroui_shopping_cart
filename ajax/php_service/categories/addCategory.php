<?php 
  
    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/categories.php');
    require('./../../../helpers/utf8_convert.php');

    $cateModel = new categories();


    $queryResult = false;

    $name = $_POST['name'];
    $image=$_FILES['image']['name'];
    $link_name = utf8_to_url($name);

    if(strlen($name)> 0  && strlen($image)>0){
       

        $sourcePath = $_FILES['image']['tmp_name'];      
        $targetPath = "./../../../public/img/".$image; 
    
        $data = [
            'name' => $name,
            'image' => $image,
            'link_name'=>$link_name
        ];
    
        if(file_exists('./../../../public/img/' . $image)){
           $queryResult = $cateModel->addNewCategory($data);
        }
        else{
            if(move_uploaded_file($sourcePath,$targetPath)){
                $queryResult = $cateModel->addNewCategory($data);
            }
        }
    }

   
  //  $queryResult = "vcl";
    
  
    echo(json_encode($queryResult));
?>

