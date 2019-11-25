<?php 
require_once '../model/messagesModel.php';

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $idMessage = $_GET['msmid'];
        
            $atach = MessagesModel::getAttachments($idMessage);

            echo $atach['attachmentPath'] ;

        }
