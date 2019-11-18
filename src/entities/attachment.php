<?php 
class Atachments{

    public $ID;
    public $atachmentPath;
    public $updateTime;

    public function __construct($ID , $atachmentPath, $updateTime) {
        $this->ID = $ID;
        $this->atachmentPath = $atachmentPath;
        $this->updateTime = $updateTime;
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getatachmentPath(){
        return $this->atachmentPath;
    }

    public function setatachmentPath($atachmentPath){
        $this->atachmentPath = $atachmentPath;
    }

    public function getupdateTime(){
        return $this->updateTime;
    }

    public function setupdateTime($updateTime){
        $this->updateTime = $updateTime;

    }


    
}