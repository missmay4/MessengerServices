<?php
    require_once '../model/archiveModel.php';
    require_once '../entities/attachment.php';

class archiveController{

    public static function modifyArchive($archive){
        return archiveModel::SaveArchive($archive);
    }

    public static function attachArchive($archive){
        date_default_timezone_set('Europe/Madrid');
        archiveModel::AttachArchive($archive);
        archiveModel::updateAttachments($archive);
    }

}
