<?php
    /**
     * Manage http requests to get an array with users
     */
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';
    require_once '../controller/userController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $users = MessagerController::getUsers();
        echo json_encode($users);

        /*$user = userController::getUserList();
        echo json_encode($user);*/
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }



?>