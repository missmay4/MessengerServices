<?php
class BBDD{

    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $squema = "messengerservice";

    public static function getConnetion(){
        try {
            $conn = new PDO("mysql:host=". self::$servername .";dbname=". self::$squema , self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die(500);
        }
        
    }
}
