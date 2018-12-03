<?php 
    require('./../../libs/Config.php');
    require('./../../libs/Database.php');
    require('./../../models/categories.php');

    $cateModel = new categories();

    $result = false;

     $name = $_POST['name'];
     $image=$_FILES['image']['name'];
   
    $sourcePath = $_FILES['image']['tmp_name'];      
    $targetPath = "./../../public/img/".$image; 

    $data = [
        'name' => $name,
        'image' => $image
    ];
    $result = $cateModel->addNewCategory($data);
//     if(file_exists('./../../public/img/' . $image)){
//         //nếu đã tòn tại, ko cần save hình, insert db
//         $result = $cateModel->addNewCategory($data);
//     }
//     else{
//        // nếu chưa tồn tại,save hình
//         if(move_uploaded_file($sourcePath,$targetPath)){
//             //nếu save hình thành công, insert db
//             $result = $cateModel->addNewCategory($data);
//         }
//    }
   echo(json_encode($result));

?>