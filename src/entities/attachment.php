<?php

/**
 * Class Attachments
 */
class Attachments{

    /**
     * @var $ID
     */
    private $ID;
    /**
     * @var $attachmentPath
     */
    private $attachmentPath;
    /**
     * @var $updateTime
     */
    private $updateTime;
    /**
     * @var $filename
     */
    private $filename ;
    /**
     * @var $messageID
     */
    private $messageID;

    /**
     * Attachments constructor.
     * @param $ID
     * @param $attachmentPath
     * @param $updateTime
     * @param $messageID
     * @param $name
     */
    public function __construct($ID , $attachmentPath, $updateTime , $messageID , $name ) {
        $this->ID = $ID;
        $this->attachmentPath = $attachmentPath;
        $this->updateTime = $updateTime;
        $this->messageID = $messageID;
        $this->filename = $name;
    }

    /**
     * Get the ID of the file attached
     * @return $this->ID
     */
    public function getID(){
        return $this->ID;
    }

    /**
     * Get the path of the file attached
     * @return $this->attachmentPath
     */
    public function getattachmentPath(){
        return $this->attachmentPath;
    }

    /**
     * Get the update time of the file
     * @return $this->updateTime
     */
    public function getupdateTime(){
        return $this->updateTime;
    }

    /**
     * Get the ID of the message which has an attached file
     * @return $this->messageID
     */
    public function getMessageID(){
        return $this->messageID;
    }

    /**
     * Get the name of the attached file
     * @return $this->filename
     */
    public function getName(){
        return $this->filename;
    }

    /**
     * Set the id of the attached file
     * @param $ID
     */
    public function setID($ID){
        $this->ID = $ID;
    }

    /**
     * Set the attached file path
     * @param $attachmentPath
     */
    public function setattachmentPath($attachmentPath){
        $this->attachmentPath = $attachmentPath;
    }


    /**
     * Set the update time of the file
     * @param $updateTime
     */
    public function setupdateTime($updateTime){
        $this->updateTime = $updateTime;

    }

    /**
     * Set the messageID which has an attached file
     * @param $messageID
     */
    public function setMessageID($messageID){
        $this->messageID = $messageID;
    }

    /**
     * Set a name to the attached file
     * @param $name
     */
    public function setName($name){
        $this->filename = $name;
    }

    
}