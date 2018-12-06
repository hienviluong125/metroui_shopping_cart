<?php

    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/categories.php');

    $cateModel = new categories();

    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE);
    $result = $cateModel->deleteCategoryById($input['id']);
   

    echo(json_encode($result));
?>

