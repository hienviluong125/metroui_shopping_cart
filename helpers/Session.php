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
        return $_SESSION[$key];
    }

    function authentication(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
            if($_SESSION['user']['role'] != 'admin'){
                // header('Location: '. ROOTURL . '/home');
                echo("<br><br><br><br><br><br><br><br><h1>Đã đăng nhập và là member</h1>");

            }
        }
        //header('Location: '. ROOTURL . '/user/login');
    }
?>