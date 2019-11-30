<?php

/**
 * Class Users
 */
class Users{

    /**
     * @var $ID
     */
    private $ID;
    /**
     * @var $username
     */
    private $username;
    /**
     * @var $password
     */
    private $password;
    /**
     * @var $lastvisit
     */
    private $lastvisit;
    /**
     * @var $userphoto
     */
    private $userphoto;
    /**
     * @var $email
     */
    private $email;
    /**
     * @var $age
     */
    private $age;
    /**
     * @var $address
     */
    private $address;
    /**
     * @var $hobbies
     */
    private $hobbies;

    /**
     * Users constructor.
     * @param $ID
     * @param $username
     * @param $password
     * @param null $lastvisit
     * @param null $userphoto
     * @param null $email
     * @param null $age
     * @param null $address
     * @param null $hobbies
     */
    public function __construct($ID , $username , $password , $lastvisit = null , $userphoto = null , $email = null, $age = null, $address = null , $hobbies = null) {
            $this->ID = $ID;
            $this->username = $username;
            $this->password = $password;
            $this->lastvisit = $lastvisit;
            $this->userphoto = $userphoto;
            $this->email = $email;
            $this->age = $age;
            $this->address = $address;
            $this->hobbies = $hobbies;
        }

    /**
     * Getters and setters
     */

    /**
     * Get the ID of the user
     * @return $this->ID
     */
    public function getID(){
            return $this->ID;
        }

    /**
     * Get the username of the user
     * @return $this->username
     */
    public function getUserName(){
            return $this->username;
        }

    /**
     * Get the password of the user
     * @return $this->password
     */
    public function getPassword(){
            return $this->password;
        }

    /**
     * Get the time of the last visit of the user
     * @return $this->lastvisit
     */
    public function getLastVisit(){
            return $this->lastvisit;
        }

    /**
     * Get the user photo
     * @return $this->userphoto
     */
    public function getUserPhoto( ){
        return $this->userphoto;
    }

    /**
     * Convert to the string ID, username, password and last visit of the user
     * @return string
     */
    public function toString(){
        return $this->getID() ." ".$this->getUserName()." ".$this->getPassword() ." " .$this->getLastVisit();
    }

    /**
     * Get the email of the user
     * @return $this->email
     */
    public function getEmail( ){
        return $this->email;
    }

    /**
     * Get the age of the user
     * @return $this->age
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Get the address of the user
     * @return $this->address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the hobbies of the user
     * @return $this->hobbies
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set the user ID
     * @param $newID
     */
    public function setID($newID ){
            $this->ID = $newID;
        }

    /**
     * Set the email of the user
     * @param $newEmail
     */
    public function setEmail($newEmail ){
            $this->email = $newEmail;
        }

    /**
     * Set the user photo
     * @param $userPhoto
     */
    public function setUserPhoto($userPhoto ){
            $this->userphoto = $userPhoto;
        }

    /**
     * Set the name of the user
     * @param $name
     */
    public function setUserName($name ){
            $this->username = $name;
        }

    /**
     * Set the password of the user
     * @param $newPassword
     */
    public function setPassword($newPassword ){
            $this->password = $newPassword;
        }

    /**
     * Set the format of the last visit
     */
    public function setLastVisit(){
            $this->lastvisit = date('Y-M-d h:m:s');
        }

    /**
     * Set the address of the user
     * @param $address
     */
    public function setAddress($address)
        {
            $this->address = $address;
        }

    /**
     * Set the age of the user
     * @param $age
     */
    public function setAge($age)
        {
            $this->age = $age;
        }

    /**
     * Set the hobbies of the user
     * @param $hobbies
     */
    public function setHobbies($hobbies)
        {
            $this->hobbies = $hobbies;
        }

    }