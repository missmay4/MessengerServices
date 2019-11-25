<?php 
require_once '../model/messagesModel.php';
require_once '../model/userModel.php';
/**
 * Class to controll messages 
 */
class MessagerController{

    /**
     * Call to modify Messages
     *  params Messages Objects
     */
    public static function modifyMessage($message){
        MessagesModel::ModifyMessages($message);
    }

    /**
     * Get messages from a users
     * Params Users Object
     * 
     * Change id of sender by the name 
     * 
     * make a array with all messages and
     * return it
     */
    public static function getMessages($user){
        $messages = MessagesModel::getMessages($user);
        $msmReady = array();
        foreach ($messages as $msm) {
            $sender =  UserModel::getUserID($msm->getSender());
            $msm->setSender($sender->getUserName());
            $msm->setIDSender($sender->getID());
            $msm->setPhotoSender($sender->getUserPhoto());
            array_push($msmReady, $msm);
        }
        return $msmReady;
    }
    /**
     * Return list of users
     */
    public static function getUsers(){
        return UserModel::getListUsers();
    }

    /**
     * Recive a Message Object and return if message
     * was inserted
     */
    public static function sendMail( $message ){
        return MessagesModel::sendMessages($message);
    }

}