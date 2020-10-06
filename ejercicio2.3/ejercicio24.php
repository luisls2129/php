<?php

$miArray =[
    3, 4 ,65 ,6
];

function arrayNuevo(int $numero, array &$array,int ... $numeros){
    $sumaNumeros = 0;
    foreach ($numeros as $value) {
        $sumaNumeros += $value;
    }
    $sumaNumeros += $numero;
    $array[] = $sumaNumeros;

    var_dump($array);
}

arrayNuevo(5,$miArray, 5, 3, 2);

