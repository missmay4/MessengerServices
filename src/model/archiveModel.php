<?php

require_once '../utils/bbdd.php';

class archiveModel{

    public static function updateAttachments($file){
        $query = "INSERT INTO Attachments (attachmentPath, updateTime, IDMessage ) VALUES (:attachmentPath, :updateTime , :idmMessage)";
        $attachmentPath = $file->getattachmentPath();
        $updateTime = $file->getupdateTime();

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

    public static function AttachArchive ($file){
        $target_dir = "../views/attachments/";
        $file_name = $file->getattachmentPath();
        $uploadOk = 1;

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file_name , $target_dir . $file_name)) {
                return true;
            } else {
                return false;
            }
        }
    }

}
