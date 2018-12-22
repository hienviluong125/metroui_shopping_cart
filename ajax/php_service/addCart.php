<?php 
    require('./../../helpers/Session.php');
    $inputJSON = file_get_contents('php://input');
    $cartObj = json_decode($inputJSON, TRUE);
    
    addCart($cartObj['id'],$cartObj['qty']);
    $cart = getSession('cart');

    echo (json_encode($cart ));
?>