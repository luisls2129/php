<?php

class Empleado{
    
    private $nombre;
    private $sueldo;

    function __construct($nombre, $sueldo){
        $this -> nombre = $nombre;
        $this -> sueldo = $sueldo;
        echo $this-> nombre . " tiene un sueldo de " . $this -> sueldo . "<br>";
    }

    public function getNombre(){
        echo $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getSuelto(){
        echo $this -> sueldo;
    }

    public function setSueldo($sueldo){
        $this -> sueldo = $sueldo;
    }
    

}
 
$empleado1 = new Empleado("Luis", 150);
$empleado1 = new Empleado("Ruben", 500);