<?php

require_once '../utils/bbdd.php';
require_once '../entities/attachment.php';

class archiveModel{
    /**
     * Update a File object in database
     */
    public static function updateAttachments($file){
        $query = "INSERT INTO Attachments (attachmentPath, updateTime, IDMessage ) VALUES (:attachmentPath, :updateTime , :idmMessage)";
        $attachmentPath = $file->getattachmentPath();
        $updateTime = $file->getupdateTime();
        $idMessage = $file->getMessageID();
        try {
            $conn = BBDD::getConnetion();

            $query = $conn->prepare($query);
            $query->bindParam(':attachmentPath', $attachmentPath);
            $query->bindParam(':updateTime', $updateTime);
            $query->bindParam(':idmMessage', $idMessage);

            $query->execute();
        } catch (PDOException $e) {
            echo $e;
        }
    }

    /**
     * Upload a profile imagen to server 
     */
    public static function SaveArchive($file){
        if (isset($file) == null){
            return false;
        }

        $file_name = $file['name'] = $_SESSION['user']->getID() . ".png";
        $target_dir = "../views/img/profile_photo/";
        if (move_uploaded_file($file['tmp_name'], $target_dir . $file_name)){
            return true;
        } else {
            return false;
        }
    }
    /** 
     *  Upload a atachment to server 
     */
    public static function AttachArchive ($file){
        $target_dir = "../views/attachments/";
        $curName = $file->getattachmentPath();
        $file_name = $file->getName();
        $uploadOk = 1;

        if ($uploadOk == 0) {
            return "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file_name , $target_dir . $curName )) {
                return true;
            } else {
                return false;
            }
        }
    }

}
