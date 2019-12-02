<?php

require_once '../utils/bbdd.php';
    require_once '../entities/messages.php';
    require_once '../entities/users.php';
    require_once '../entities/attachment.php';
    class MessagesModel{

        /**
         * Get all messages from a User order by sendintTime
         */

        public static function getMessages( $user ){
            try {
                $userID = $user->getID();
                $conn = BBDD::getConnetion();
                $query = $conn->prepare("SELECT * FROM Messages WHERE receiver = :userID ORDER BY sendingTime DESC");
                $query->bindParam(':userID' , $userID );

                $query->execute();
                $messages = array();
                while($row = $query->fetch(PDO::FETCH_ASSOC)){
                    array_push($messages , new Messages(
                        $row['ID'] ,
                        $row['sender'],
                        $row['receiver'],
                        $row['title'],
                        $row['body'],
                        $row['sendingTime'],
                        $row['seen']
                    ));
                }
                return $messages;
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }

        /**
         * Send a message to a user by ID
         */

        public static function ModifyMessages($message){
            $seen = $message->getSeen();
            $ID = $message->getID();
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('UPDATE Messages SET seen = :seen WHERE ID = :ID');
                $query->bindParam(':seen' , $seen );
                $query->bindParam(':ID', $ID);
                return $query->execute();
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }

        /**
         * Update a File object in database
         */

        public static function sendMessages($message){
            $sender = $message->getSender();
            $receiver = $message->getReceiver();
            $title = $message->getTitle();
            $body = $message->getBody();
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare("INSERT INTO Messages ( sender, receiver, title, body, sendingTime, seen) VALUES ( :sender , :receiver , :title , :body , CURTIME() , false )");
                $query->bindParam(':sender', $sender);
                $query->bindParam(':receiver', $receiver);
                $query->bindParam(':title', $title);
                $query->bindParam(':body', $body);
                $query->execute();
                return  $conn->lastInsertId();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 0;
            }
        }
        /**
         * Recover the attachments from a message
         */

        public static function getAttachments( $msmid ){
            try {
                $conn = BBDD::getConnetion();

                $query = $conn->prepare('SELECT * FROM Attachments WHERE IDMessage = :id');
                
                $query->bindParam(':id',$msmid);
    
                $query->execute();
    
                $atach = $query->fetch(PDO::FETCH_ASSOC);

                return $atach;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return 0;
            }
            
        }

    }