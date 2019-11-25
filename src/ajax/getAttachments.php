<?php 

/**
 * Manage http requests to get the message attachment path
 */

require_once '../model/messagesModel.php';

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $idMessage = $_GET['msmid'];
        
            $atach = MessagesModel::getAttachments($idMessage);

            echo $atach['attachmentPath'] ;

        }
