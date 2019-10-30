<?php

use PHPMailer\PHPMailer\Exception;

require_once '../utils/bbdd.php';
    require_once '../entities/users.php';

    class UserModel{

        public static function loginUser( $user , $password ){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('SELECT * FROM users WHERE username = :user');
                $query->bindParam(':user',$user);
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                $result =  $query->fetch();
                if(!$result || !password_verify($password , $result["password"])){
                    return false;
                }
                return new Users($result["ID"],$result["username"],$result["password"],$result["lastvisit"]);                
            } catch (PDOException $e) {
                echo $e;
                die();
            }
        }
        public static function getUserID($ID){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT username FROM users WHERE ID = '.$ID);
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                $movida =  $query->fetch();
                return $movida['username'];
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }
        public static function getListUsers(){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT ID , username FROM users');
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }
        public static function insertUser($user , $password){

            $hashPass = password_hash($password ,PASSWORD_DEFAULT);
            $currTime =  date('Y-m-d h:m:s');

            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('INSERT INTO `users` (`ID`, `username`, `password`, `lastvisit`) VALUES (NULL,:user,:pass,:curTime)');
                $query->bindParam(':user',$user);
                $query->bindParam(':pass', $hashPass);
                $query->bindParam(':curTime', $currTime);
                $query->execute();
                return self::loginUser($user , $password);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 0;
            }
        }
    }