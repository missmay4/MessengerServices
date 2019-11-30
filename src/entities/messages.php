<?php

/**
 * Class Messages
 */
class Messages implements JsonSerializable{
    /**
     * @var $ID
     */
    private $ID;
    /**
     * @var $IDSender
     */
    private $IDsender;
    /**
     * @var $sender
     */
    private $sender;
    /**
     * @var $photoSender
     */
    private $photoSender;
    /**
     * @var $receiver
     */
    private $receiver;
    /**
     * @var $title
     */
    private $title;
    /**
     * @var $body
     */
    private $body;
    /**
     * @var $sendingTime
     */
    private $sendingTime;
    /**
     * @var $seen
     */
    private $seen;

    /**
     * Messages constructor.
     * @param $ID
     * @param $sender
     * @param $receiver
     * @param $title
     * @param $body
     * @param $sendingTime
     * @param $seen
     */
    public function __construct($ID , $sender , $receiver , $title , $body , $sendingTime , $seen) {
            $this->ID = $ID;
            $this->sender = $sender;
            $this->receiver = $receiver;
            $this->title = $title;
            $this->body = $body;
            $this->sendingTime = $sendingTime;
            $this->seen = $seen;
        }

    /**
     * Convert into JSON the params on messages
     * @return array
     */
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

    /**
     * Getters and setters
     */

    /**
     * Get the message ID
     * @return $this->ID
     */
    public function getID(){
            return $this->ID;
        }

    /**
     * Set the ID of the sender
     * @return $this->IDsender
     */
    public function getIDsender(){
            return $this->IDsender;
        }

    /**
     * Get the photo of the sender
     * @return $this->photoSender
     */
    public function getPhotoSender(){
        return $this->photoSender;
    }

    /**
     * Get the name of the sender
     * @return $this->sender
     */
    public function getSender(){
            return $this->sender;
        }

    /**
     * Get the name of the receiver
     * @return $this->receiver
     */
    public function getReceiver(){
            return $this->receiver;
        }

    /**
     * Get the title of the message
     * @return $this->title
     */
    public function getTitle(){
            return $this->title;
        }

    /**
     * Get the body of the message
     * @return $this->body
     */
    public function getBody(){
            return $this->body;
        }

    /**
     * Get the sending time of the message
     * @return $this->sendingTime
     */
    public function getSendingTime(){
            return $this->sendingTime;
        }

    /** Get if the message as been seen
     * @return $this->seen
     */
    public function getSeen(){
        return $this->seen;
    }

    /**
     * Set the message ID
     * @param $ID
     */
    public function setID($ID ){
            $this->ID = $ID;
        }

    /**
     * Set the ID of the sender
     * @param $idSender
     */
    public function setIDSender($idSender){
            $this->IDsender = $idSender;
        }

    /**
     * Set the photo of the sender
     * @param $photoSender
     */
    public function setPhotoSender($photoSender ){
        $this->photoSender = $photoSender;
    }

    /**
     * Set the name of the sender
     * @param $sender
     */
    public function setSender($sender ){
            $this->sender = $sender;
        }

    /**
     * Set the name of the receiver
     * @param $receiver
     */
    public function setReceiver($receiver){
            $this->receiver = $receiver;
        }

    /**
     * Set the title of the message
     * @param $title
     */
    public function setTitle($title){
            $this->title = $title;
        }

    /**
     * Set the body of the message
     * @param $body
     */
    public function setBody($body ){
            $this->body = $body;
        }

    /**
     * Set the sending time of the message
     * @param $time
     */
    public function setSendingTime($time ){
            $this->sendingTime = $time;
        }

    /**
     * Set the state of the message (seen/not seen)
     * @param $seen
     */
    public function setSeen($seen){
            $this->seen = $seen;
        }
    }