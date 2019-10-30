<?php
    class Users{

        private $ID;
        private $username;
        private $password;
        private $lastvisit;
        
        public function __construct($ID , $username , $password , $lastvisit) {
            $this->ID = $ID;
            $this->username = $username;
            $this->password = $password;
            $this->lastvisit = $lastvisit;
        }

        public function getID(){
            return $this->ID;
        }

        public function getUserName(){
            return $this->username;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getLastVisit(){
            return $this->lastvisit;
        }

        public function setID( $newID ){
            $this->ID = $newID;
        }

        public function setUserName( $name ){
            $this->username = $name;
        }

        public function setPassword( $newPassword ){
            $this->password = $newPassword;
        }

        public function setLastVisit(){
            $this->lastvisit = date('Y-M-d h:m:s');
        }

        public function toString(){
            return $this->getID() ." ".$this->getUserName()." ".$this->getPassword() ." " .$this->getLastVisit();
        }
    }