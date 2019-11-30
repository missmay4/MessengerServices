<?php

    /**
        * Manage http requests to get an array with the messages of a user, who is logged
    */
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $message = MessagerController::getMessages($_SESSION['user']);
        
        
        echo json_encode($message);
    }
    else{

        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));

    }

?>