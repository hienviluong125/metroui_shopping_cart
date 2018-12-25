<?php 
    require('./../../helpers/Session.php');
    $inputJSON = file_get_contents('php://input');
    $cartItemList = json_decode($inputJSON, TRUE);

    clearSession('cart');
    createSession('cart',$cartItemList);
?>