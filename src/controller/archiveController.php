<?php
    require_once '../model/archiveModel.php';
    require_once '../entities/attachment.php';
/**
 * Class to manage archive (Controller)
 */
class archiveController{

    /**
     * @param $archive
     * @return bool
     * Save an uploaded archive
     */

    public static function modifyArchive($archive){
        return archiveModel::SaveArchive($archive);
    }

    /**
     * @param $archive
     * Attach a file to a message
     */
    public static function attachArchive($archive){
        date_default_timezone_set('Europe/Madrid');
        return archiveModel::updateAttachments($archive);
    }

    /**
     * @param $archive
     * @return bool|string
     * Save the attachments
     */
    public static function saveArchive($archive){
        return archiveModel::AttachArchive($archive);
    }

}
