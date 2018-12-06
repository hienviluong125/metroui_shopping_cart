<?php
    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/categories.php');
  

  $model = new categories();
  $data = $model->getAllCategories(0);
   
  echo (json_encode($data));
?>