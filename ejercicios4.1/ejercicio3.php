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

}
 
$empleado1 = new Empleado("Luis", 150);
if ($empleado1 -> debePagarImpuestos()) {
    echo $empleado1 -> getNombre() . " tiene que pagar impuestos <br>";
}else{
    echo $empleado1 -> getNombre() . " no tiene que pagar impuestos <br>";
}

$empleado2 = new Empleado("Ruben", 1250);
if ($empleado2 -> debePagarImpuestos()) {
    echo $empleado2 -> getNombre() . " tiene que pagar impuestos <br>";
}else{
    echo $empleado2 -> getNombre() . " no tiene que pagar impuestos <br>";
}