<?php
    class Users{

        private $ID;
        private $username;
        private $password;
        private $lastvisit;
        private $userphoto;
        private $email;
        
        public function __construct($ID , $username , $password , $lastvisit , $userphoto , $email) {
            $this->ID = $ID;
            $this->username = $username;
            $this->password = $password;
            $this->lastvisit = $lastvisit;
            $this->userphoto = $userphoto;
            $this->email = $email;
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
        public function setEmail( $newEmail ){
            $this->email = $newEmail;
        }
        public function getEmail( ){
            return $this->email;
        }
        public function setUserPhoto( $userPhoto ){
            $this->userphoto = $userphoto;
        }
        public function getUserPhoto( ){
            return $this->userphoto;
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