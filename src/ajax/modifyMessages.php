<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $msm = new Messages(
            $_POST['ID'],
            $_POST['sender'],
            $_POST['receiver'],
            $_POST['title'],
            $_POST['body'],
            $_POST['sendingTime'],
            $_POST['seen']
        );
        
        MessagerController::modifyMessage($msm);
        echo json_encode(array( 'code' => '200' , 'error' => "OK"));
        return ;
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }

?>