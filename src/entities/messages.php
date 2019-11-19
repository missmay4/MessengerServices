<?php 
    class Messages implements JsonSerializable{
        private $ID;
        private $IDsender;
        private $sender;
        private $photoSender;
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

        public function jsonSerialize(){
            return array(
                'ID' => $this->getID(),
                'IDSender' => $this->getIDsender(),
                'photoSender' => $this->getPhotoSender(),
                'sender'=>$this->getSender(),
                'receiver'=>$this->getReceiver(),
                'title' => $this->getTitle(),
                'body' => $this->getBody(),
                'sendingTime'=>$this->getSendingTime(),
                'seen' =>$this->getSeen()
            );
        }

        public function getPhotoSender(){
            return $this->photoSender;
        }
        public function setPhotoSender( $photoSender ){
            $this->photoSender = $photoSender;
        }
        public function getID(){
            return $this->ID;
        }

        public function getIDsender(){
            return $this->IDsender;
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
            $this->ID = $ID;
        }

        public function setIDSender($idSender){
            $this->IDsender = $idSender;
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