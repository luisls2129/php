<?php

$miArray = [3, 5, 67, 898];

function insertar(int $numero, array &$miArray, int ...$sumar) {
    $resultado = $numero;
    foreach ($sumar as $value) {
        $resultado += $value;
    }
    $miArray[] = $resultado;
}

insertar(2, $miArray, 3, 5, 6);
var_dump($miArray);