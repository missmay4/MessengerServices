<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $msm = new Messages(
            null,
            $_SESSION['user']->getID(),
            $_POST['receiver'],
            $_POST['title'],
            $_POST['body'],
            null,
            null
        );
        echo MessagerController::sendMail($msm);
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }

?>