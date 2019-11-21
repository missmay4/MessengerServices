<?php 
class Attachments{

    private $ID;
    private $attachmentPath;
    private $updateTime;
    private $filename ;
    private $messageID;

    public function __construct($ID , $attachmentPath, $updateTime , $messageID , $name ) {
        $this->ID = $ID;
        $this->attachmentPath = $attachmentPath;
        $this->updateTime = $updateTime;
        $this->messageID = $messageID;
        $this->filename = $name;
    }

    public function getID(){
        return $this->ID;
    }

    public function setName($name){
        $this->filename = $name;
    }

    public function getName(){
        return $this->filename;
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