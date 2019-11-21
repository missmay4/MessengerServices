<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';
    require_once '../controller/archiveController.php';

    SessionService::manageSession();
    
    


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       $id = uniqid();

       $msm = new Messages(
            $id,
            $_SESSION['user']->getID(),
            $_POST['destination'],
            $_POST['title'],
            $_POST['body'],
            null,
            null
        );
        
        MessagerController::sendMail($msm);

        
        $file = new Attachments( null , $_FILES['fileToUpload']['name'] , date('Y-m-d G:m:s'), $id );
        archiveController::attachArchive($file);
        
         echo json_encode(array( 'code' => '300' , 'error' => "OK"));;
    }
    else{
        echo json_encode(array( 'code' => '400' , 'error' => "Bad Request"));
    }

?>