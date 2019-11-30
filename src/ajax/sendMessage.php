<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';
    require_once '../controller/archiveController.php';

    /**
     * Manage http requests to send a message
     */
    SessionService::manageSession();
    $userid = $_SESSION['user']->getID();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $msm = new Messages(
            null ,
            $userid,
            $_POST['destination'],
            $_POST['title'],
            $_POST['body'],
            null,
            null
        );
        $msmID = MessagerController::sendMail($msm);

        if(isset($_FILES['file'])){
            //end(explode('.', $_FILES['file']['name']));
            $file = new Attachments( null , $_FILES['file']['name'] , date('Y-m-d G:m:s'), $msmID ,  $_FILES['file']['tmp_name']);
            archiveController::attachArchive($file);
            archiveController::saveArchive($file);
        }
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }

?>