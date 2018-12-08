<?php
    require('./../../../libs/Config.php');
    require('./../../../libs/Database.php');
    require('./../../../models/products.php');
  

    $model = new products();
    $data = $model->getAllProducts(0);
  echo (json_encode($data));
?>