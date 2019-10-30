<?php

class Groups{
    public $ID;
    public $nombre;

    public function __construct($ID , $nombre) {
        $this->ID = $ID;
        $this->nombre = $nombre;
    }

    public function getID(){
        return $this->ID;
    }

    public function setID($ID){
        $this->ID = $ID;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
}
