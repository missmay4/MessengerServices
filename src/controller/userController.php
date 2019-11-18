<?php  
    require_once '../model/userModel.php';
    require_once '../utils/sessionService.php';
    class userController{

        public static function modifyUsers( $user ){
            UserModel::modifyUsers($user);
            $user = UserModel::getUserID($_SESSION['user']->getID());
            SessionService::updateSession($user);
            header('Location: profile.php');
        }

        public static function modifyPassword($user){
            UserModel::modifyPassword();
            $user = UserModel::getUsername($_POST['user']->getName());
            SessionService::updateSession($user);
            header('Location: profile.php');
        }

    }