<?php

class archiveModel{
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

}
