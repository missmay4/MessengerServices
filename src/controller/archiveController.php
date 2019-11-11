<?php
    require_once '../model/archiveModel.php';

class archiveController{

    public static function modifyArchive($archive){
        return archiveModel::SaveArchive($archive);
    }



}
