<?php
    require_once '../model/archiveModel.php';

class archiveController{

    public static function modifyArchive($archive){
        return archiveModel::SaveArchive($archive);
    }

    public static function attachArchive($archive){
        return archiveModel::AttachArchive($archive);
    }

    public static function updateAttach($archive){
        return archiveModel::updateAttachments($archive);
    }



}
