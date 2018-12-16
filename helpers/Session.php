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