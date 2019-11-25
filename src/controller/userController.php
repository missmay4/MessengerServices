<?php  
    require_once '../model/userModel.php';
    require_once '../utils/sessionService.php';
    /**
     * Class to controll users 
     */
    class userController{
        /**
         * Params a Users Object
         * Update the session y 
         * database
         */
        public static function modifyUsers( $user ){
            UserModel::modifyUsers($user);
            $user = UserModel::getUserID($_SESSION['user']->getID());
            SessionService::updateSession($user);
            header('Location: profile.php');
        }
        /**
         * Modify a user password
         */
        public static function modifyPassword($idrec , $pass){
            UserModel::modifyPassword($idrec , $pass);
            header('Location: login.php');
        }

    }