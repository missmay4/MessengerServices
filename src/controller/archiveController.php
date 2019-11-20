<?php
    require_once '../model/archiveModel.php';
    require_once '../entities/attachment.php';

class archiveController{

    public static function modifyArchive($archive){
        return archiveModel::SaveArchive($archive);
    }

    public static function attachArchive($archive){
        date_default_timezone_set('Europe/Madrid');
        $file = new Attachments( null , $archive['name'] , date('Y-m-d G:m:s'));
        archiveModel::AttachArchive($file);
        archiveModel::updateAttachments($file);
    }

}
