<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';
    require_once '../controller/userController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $message = MessagerController::getUsers();
        echo json_encode($message);

        $user = userController::getUserList();
        echo json_encode($user);
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }



?>