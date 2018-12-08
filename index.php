<?php 
     require_once('helpers/Bootstrap.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo ROOTURL; ?>/public/css/metro-all.min.css">
    <link rel="stylesheet" href="<?php echo ROOTURL; ?>/public/css/custom.css">

</head>
<body>
    

    <?php 
        $app = new main();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/metro.min.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/categories.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/products.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/main.js"></script>

   
</body>
</html>

  

