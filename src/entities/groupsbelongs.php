<?php

class GroupsBelong{
    
    public $ID;
    public $userId;
    public $groupId;


    public function __construct($ID, $userId, $groupId){
        $this->ID = $ID;
        $this->userId = $userId;
        $this->groupId = $groupId;
    }

    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function setUserId($userId){
        $this->userId = $userId;
    }
    public function getGroupId(){
        return $this->groupId;
    }

    public function setGroupId($groupId){
        $this->groupId = $groupId;
    }
}
