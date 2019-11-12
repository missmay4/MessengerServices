<?php
class BBDD{

    private static $servername = "localhost";
    private static $username = "MSM";
    private static $password = "ROOT";
    private static $squema = "MessengerService";

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
