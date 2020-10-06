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
    
    public function debePagarImpuestos(){
        $debe = false;
        if ($this -> sueldo > 1200) {
            $debe = true;
        }

        return $debe;

    }

    public function mensajeImpuestos(){

        $tiene = " tiene que pagar impuestos <br>";
        $noTiene = " no tiene que pagar impuestos <br>";

        if ($this->debePagarImpuestos()) {
            echo $this -> nombre . $tiene;
        }else{
            echo $this -> nombre . $noTiene;
        }

    }

}
 
$empleado1 = new Empleado("Luis", 150);
$empleado1 -> mensajeImpuestos();

$empleado2 = new Empleado("Ruben", 1250);
$empleado2 -> mensajeImpuestos();