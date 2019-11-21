<?php 
class Attachments{

    public $ID;
    public $attachmentPath;
    public $updateTime;
    public $messageID;

    public function __construct($ID , $attachmentPath, $updateTime , $messageID) {
        $this->ID = $ID;
        $this->attachmentPath = $attachmentPath;
        $this->updateTime = $updateTime;
        $this->messageID = $messageID;
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getMessageID(){
        return $this->messageID;
    }

    public function setMessageID($messageID){
        $this->messageID = $messageID;
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