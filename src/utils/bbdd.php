<?php
class BBDD{

    private static $servername = "localhost"; //Server Name
    private static $username = "MSM"; // Database User
    private static $password = "ROOT"; //Password
    private static $squema = "MessengerService"; //Database Name
    /**
     * Return a Connection Object
     */
    public static function getConnetion(){
        try {
            $conn = new PDO("mysql:host=". self::$servername .";dbname=". self::$squema , self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //Set Error Managment
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die(500);
        }
        
    }
}
