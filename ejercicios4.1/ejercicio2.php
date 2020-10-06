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

    public function getSuelto(){
        echo $this -> sueldo;
    }
    

}
 
$empleado1 = new Empleado("Luis", 150);
$empleado2 = new Empleado("Ruben", 500);