<?php
/**
 *  Service to centralize session management
 */
    class SessionService{
        /**
         * Params a Users Object
         * to update the session
         */
        public static function updateSession($usuario){
            $_SESSION['user'] = $usuario;
        } 
        /**
         * if Params is not null , (Object Users)
         * set it to session 
         * return 1 if is logged 
         * and redirect to login php in other ways
         * 
         */
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
        /**
         * Close the session
         */
        public static function exterminateSession(){
            if(isset($_SESSION['user'])){
                session_destroy();
            }
            setcookie("PHPSESSID","",time()-3600,"/");
        }
    }