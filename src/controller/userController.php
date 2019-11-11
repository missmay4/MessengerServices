<?php  
    require_once '../model/userModel.php';
    class userController{

        public static function modifyUsers( $user ){
            UserModel::modifyUsers($user);
            
        }
    }