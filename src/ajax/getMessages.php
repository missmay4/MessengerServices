<?php
    require_once '../utils/sessionService.php';
    require_once '../controller/messagerController.php';

    SessionService::manageSession();
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $message = MessagerController::getMessages($_SESSION['user']);
        
        echo json_encode($message);
    }

?>