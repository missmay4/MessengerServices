<?php 
require_once '../model/messagesModel.php';
require_once '../model/userModel.php';
class MessagerController{

    public static function modifyMessage($message){
        return MessagesModel::ModifyMessages($message);
    }

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

    public static function getUsers(){
        return UserModel::getListUsers();
    }

    public static function sendMail( $message ){
        MessagesModel::sendMessages($message);
    }

}