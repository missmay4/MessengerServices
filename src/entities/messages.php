<?php 
    class Messages{
        private $ID;
        private $sender;
        private $receiver;
        private $title;
        private $body;
        private $sendingTime;
        private $seen;

        public function __construct($ID , $sender , $receiver , $title , $body , $sendingTime ,$seen) {
            $this->ID = $ID;
            $this->sender = $sender;
            $this->receiver = $receiver;
            $this->title = $title;
            $this->body = $body;
            $this->sendingTime = $sendingTime;
            $this->seen = $seen;
        }

        public function getID(){
            return $this->ID;
        }

        public function getSender(){
            return $this->sender;
        }

        public function getReceiver(){
            return $this->receiver;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getBody(){
            return $this->body;
        }

        public function getSendingTime(){
            return $this->sendingTime;
        }

        public function setID( $ID ){
            return $this->ID;
        }

        public function setSender( $sender ){
            $this->sender = $sender;
        }

        public function setReceiver($receiver){
            $this->receiver = $receiver;
        }

        public function setTitle($title){
            $this->title = $title;
        }

        public function setBody( $body ){
            $this->body = $body;
        }

        public function setSendingTime( $time ){
            $this->sendingTime = $time;
        }
        
        public function getSeen(){
            return $this->seen;
        }
        
        public function setSeen($seen){
            $this->seen = $seen;
        }
    }