<?php 
     require_once('libs/Config.php');
     require_once('libs/Database.php');
     require_once('libs/BaseController.php');
     require_once('libs/main.php');
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

    <script src="<?php echo ROOTURL; ?>/public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/metro.min.js"></script>
    <script src="<?php echo ROOTURL; ?>/public/js/main.js"></script>

   
</body>
</html>

  

