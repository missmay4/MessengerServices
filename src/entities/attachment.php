<?php 
class Attachments{

    public $ID;
    public $attachmentPath;
    public $updateTime;

    public function __construct($ID , $attachmentPath, $updateTime) {
        $this->ID = $ID;
        $this->attachmentPath = $attachmentPath;
        $this->updateTime = $updateTime;
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getattachmentPath(){
        return $this->attachmentPath;
    }

    public function setattachmentPath($attachmentPath){
        $this->attachmentPath = $attachmentPath;
    }

    public function getupdateTime(){
        return $this->updateTime;
    }

    public function setupdateTime($updateTime){
        $this->updateTime = $updateTime;

    }


    
}