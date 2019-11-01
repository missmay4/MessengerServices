<?php
require_once '../model/userModel.php';
require_once '../utils/sessionService.php';

class LoginController
{

    public static function checkLogin($username, $password)
    {
        $res = UserModel::loginUser($username, $password);
        if (!$res) { 
            header('Location: login.php');
            return 0;
        }
        if(!SessionService::manageSession($res)) {
            header('Location: login.php');
            return 0;
        }
        header('Location: ../views/messager.php');
    }

    public static function makeLogin( $user )
    {
        $res = UserModel::insertUser($user);
        if (!$res) { 
            header('Location: login.php');
            return 0;
        }
        if(!SessionService::manageSession($res)) {
            header('Location: login.php');
            return 0;
        }
        header('Location: ../views/messager.php');
    }
}
