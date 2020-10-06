<?php

include "ejercicio17a.php";

$nombreMayor = "";
$nombreMenor = "";
$edadMayor = 0;
$edadMenor = 100;

foreach ($empleados as $key => $value) {
    var_dump($value);

    if($value['edad'] > $edadMayor){
        $edadMayor = $value['edad'];
        $nombreMayor = $value['nombre'];
    }

    if($value['edad'] < $edadMenor){
        $edadMenor = $value['edad'];
        $nombreMenor= $value['nombre'];
    }


}

echo " El mayor es $nombreMayor<br>El menor es $nombreMenor"; 