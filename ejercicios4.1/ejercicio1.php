<?php

class Empleado{
    
    private $nombre;
    private $sueldo;

    function __construct(){
        
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getSueldo(){
        return $this -> sueldo;
    }

    public function setSueldo($sueldo){
        $this -> sueldo = $sueldo;
    }
    

}

$empleado1 = new Empleado();
$empleado1->setNombre("Luis");
$empleado1->setSueldo(150);
$empleado2 = new Empleado();
$empleado2->setNombre("Ruben");
$empleado2->setSueldo(500);

echo $empleado1 -> getNombre() . " tiene un sueldo de " . $empleado1->getsueldo() . "<br>";
echo $empleado2 -> getNombre() . " tiene un sueldo de " . $empleado2 -> getSueldo() . "<br>";