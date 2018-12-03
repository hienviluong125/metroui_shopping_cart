<?php
  require('./../../libs/Config.php');
  require('./../../libs/Database.php');
  require('./../../models/products.php');

  $model = new products();
  $data = $model->getAllProducts();
   
    echo json_encode($data);
?>