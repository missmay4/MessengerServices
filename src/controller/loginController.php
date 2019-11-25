<?php
require_once '../model/userModel.php';
require_once '../utils/sessionService.php';
/**
 * Class to manage login (Controller)
 */
class LoginController
{

    /**
     * Check the users credentials ,
     * if the credentials are corrects,
     * create a session and redirect to
     * login.php
     */
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

    /**
     * Call to insert User and 
     * create a session and redirect to
     * login.php
     */
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
