<?php

require_once '../utils/bbdd.php';
    require_once '../entities/users.php';

    class UserModel{

        public static function modifyUsers( $user ){
            $query  = "UPDATE users SET username = :username , password = ':password', userPhoto = ':userPhoto', email = ':mail', age = ':age', address = ':address', hobbies = ':hobbies' WHERE users.ID = :userID";
            $id = $user->getID();
            $username = $user->getUserName();
            $password = $user->getPassword();
            $userPhoto = $user->getUserPhoto();
            $mail = $user->getEmail();
            $age = $user->getAge();
            $address = $user->getAddress();
            $hobbies = $user->getHobbies();
            
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare($query);
                $query->bindParam(":id" , $id );
                $query->bindParam(":username",$username);
                $query->bindParam(":password" , $password);
                $query->bindParam(":userPhoto",$userPhoto);
                $query->bindParam(":mail", $mail);
                $query->bindParam(":age", $age);
                $query->bindParam(":address" , $address);
                $query->bindParam(":hobbies" , $hobbies);

                return $query->execute();

            } catch (PDOException $e) {
                echo $e;
            }
        }

        public static function loginUser( $user , $password ){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('SELECT * FROM Users WHERE username = :user');
                $query->bindParam(':user',$user);
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                $result =  $query->fetch();
                if(!$result || !password_verify($password , $result["password"])){
                    return false;
                }
                return new Users($result["ID"],$result["username"],$result["password"],$result["lastvisit"],$result["userPhoto"],$result["email"], $result["age"], $result["address"], $result["hobbies"]);
            } catch (PDOException $e) {
                echo $e;
                die();
            }
        }
        public static function getUserID($ID){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT username FROM Users WHERE ID = '.$ID);
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
                $query = $conn->query('SELECT ID , username FROM Users');
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }
        public static function insertUser( $usuario ){

            $user = $usuario->getUserName();
            $mail = $usuario->getEmail();
            $password = $usuario->getPassword();
            $hashPass = password_hash($password ,PASSWORD_DEFAULT);
            $currTime =  date('Y-m-d h:m:s');

            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('INSERT INTO Users (ID, username, password, lastvisit , email ) VALUES (NULL,:user,:pass,:curTime , :mail)');
                $query->bindParam(':user',$user);
                $query->bindParam(':pass', $hashPass);
                $query->bindParam(':curTime', $currTime);
                $query->bindParam(':mail', $mail);
                $query->execute();
                return self::loginUser($user , $password);
            } catch (PDOException $e) {
                echo $e->getMessage();
                return 0;
            }
        }

        public static function getUsernameEmail($username, $email){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare('SELECT username, email FROM Users WHERE username = :username AND email = :email');
                $query->bindParam(':username',$username);
                $query->bindParam(':email', $email);
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                $result =  $query->fetch();

                return $result["username"] . $result["email"];
            } catch (PDOException $e) {
                echo $e;
                die();
            }
        }
    }