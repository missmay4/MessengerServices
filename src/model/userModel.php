<?php

    require_once '../utils/bbdd.php';
    require_once '../entities/users.php';

    class UserModel{
        /**
         * Change the state from an user if this user ask for a password recovery
         */

        public static function changeUserState( $user , $recoveryString ){
            $conn = BBDD::getConnetion();
            $qry ="UPDATE Users SET recovery = :status WHERE username = :name";

            $query = $conn->prepare($qry);
            $query->bindParam(":name", $user);
            $query->bindParam(":status", $recoveryString);

            return $query->execute();
        }

        /**
         * Modify the data of the user in database
         */

        public static function modifyUsers( $user ){
            $query  = "UPDATE Users SET username = :username , userPhoto = :userPhoto, email = :mail, age = :age, address = :address, hobbies = :hobbies WHERE Users.ID = :userID";
            $id = $user->getID();
            $username = $user->getUserName();
            $userPhoto = $user->getUserPhoto() ? $user->getUserPhoto() : $_SESSION['user']->getUserPhoto();
            $mail = $user->getEmail();
            $age = $user->getAge() ? $user->getAge() : $_SESSION['user']->getAge();
            $address = $user->getAddress() ? $user->getAddress() : $_SESSION['user']->getAddress();
            $hobbies = $user->getHobbies() ? $user->getHobbies() : $_SESSION['user']->getHobbies();

            
            try {
                $conn = BBDD::getConnetion();

                $query = $conn->prepare($query);
                $query->bindParam(":userID" , $id );
                $query->bindParam(":username",$username); 
                $query->bindParam(":userPhoto",$userPhoto);
                $query->bindParam(":mail", $mail);
                $query->bindParam(":age", $age);
                $query->bindParam(":address" , $address);
                $query->bindParam(":hobbies" , $hobbies);

               $query->execute();

            } catch (PDOException $e) {
                echo $e;
            }
        }

        /**
         * Modify the password of the user in database
         */

        public static function modifyPassword( $idrec , $password ){
            $hashpassword = password_hash($password ,PASSWORD_DEFAULT);
            $query = "UPDATE Users SET password = :password , recovery = '' WHERE recovery = :idrecovery ";

            try {
                $conn = BBDD::getConnetion();
                $query = $conn->prepare($query);
                $query->bindParam(":idrecovery", $idrec);
                $query->bindParam(":password", $hashpassword);
                return $query->execute();
            } catch (PDOException $e) {
                echo $e;
            }

        }

        /**
         * Update the lastt visit time in database
         */

        public static function updateLastVisit( $id ) {
            $qu = 'UPDATE Users SET lastVisit = CURTIME() WHERE ID = :id';
            try{
                $conn = BBDD::getConnetion();
                $query = $conn->prepare($qu);
                $query->bindParam(':id', $id);
                return $query->execute();

            } catch (PDOException $e) {
                echo $e;
            }



        }

        /**
         * Get user login in our app
         */

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
                UserModel::updateLastVisit($result['ID']);
                return new Users($result["ID"],$result["username"],$result["password"],$result["lastvisit"],$result["userPhoto"],$result["email"], $result["age"], $result["address"], $result["hobbies"]);
            } catch (PDOException $e) {
                echo $e;
                die();
            }
        }

        /**
         * Recover a user ID
         */

        public static function getUserID($ID){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT * FROM Users WHERE ID = '.$ID);
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                $result =  $query->fetch();
                return new Users($result["ID"],$result["username"],$result["password"],$result["lastVisit"],$result["userPhoto"],$result["email"], $result["age"], $result["address"], $result["hobbies"]);;
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }

        /**
         * Get all the users from our APP
         */

        public static function getListUsers(){
            try {
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT ID , username, userPhoto, email, lastVisit, age, address, hobbies FROM Users');
                $query->setFetchMode( PDO::FETCH_ASSOC);
                $query->execute();
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
                return 0;
            }
        }

        /**
         * Insert an user into database
         */

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

        /*
        public static function getUsername($name){
            try{
                $conn = BBDD::getConnetion();
                $query = $conn->query('SELECT username FROM Users WHERE username ='.$name);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $query->execute();

                $result = $query->fetch();

                return $result;
            } catch (PDOException $e) {
                $e->getMessage();
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
        } */
    }