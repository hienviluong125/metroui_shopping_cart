<?php
    session_start();

    function createSession($key,$value){
        $_SESSION[$key] = $value;
    }

    function clearSession($key){
        unset($_SESSION[$key]);
    }

    function clearAllSession(){
        session_destroy();
    }

    function getSession($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return null;
        }
        
    }

    function addCart($id,$qty){
        $cartSession = getSession('cart');
        if($cartSession){
            $isAlreadyExist = false;
            for($i = 0;$i<count($cartSession);$i++){
                if($cartSession[$i]['id'] === $id){
                    $cartSession[$i]['qty'] = $cartSession[$i]['qty'] + $qty;
                    $isAlreadyExist = true;
                    break;
                }
            }
            if(!$isAlreadyExist){
                $cartElement = [
                    'id' => $id,
                    'qty' => $qty
                ];
                $cartSession[] = $cartElement;
            }
            createSession('cart',$cartSession);
        }else{
            $cart = [];
            $cartElement = [
                'id' => $id,
                'qty' => $qty
            ];
            $cart[] = $cartElement;
            createSession('cart',$cart);
        }
    }


    function authentication(){
        
    }

    function authorization(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['role'] != 'admin'){
                header('Location: '. ROOTURL . '/home');
            }
        }else{
           header('Location: '. ROOTURL . '/user/login');
        }
       
    }
?>