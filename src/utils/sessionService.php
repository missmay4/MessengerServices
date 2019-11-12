<?php
    class SessionService{

        public static function updateSession($usuario){
            $_SESSION['user'] = $usuario;
        } 

        public static function manageSession( $usuario = null){    
            session_start();
            if(isset($_SESSION['user'])){
                return 1;
            }
            else if($usuario) {
                $_SESSION['user'] = $usuario; 
                return 1;
            }
            else{
                header('Location: login.php');
                return 0;
            }
        }
        public static function exterminateSession(){
            if(isset($_SESSION['user'])){
                session_destroy();
            }
            setcookie("PHPSESSID","",time()-3600,"/");
        }
    }