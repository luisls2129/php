<?php

$mayo = [
    "tornillos" => 57,
    "tuercas" => 23,
    "clavos" => 45,
    "arandelas" => 56,
    "muelles" => 32
];

$junio = [
    "tornillos" => 32, // Se queda el ullimo en ser apuntado
    "arandelas" => 51,
    "bridas" => 309
];

$resultado = $junio + $mayo;
var_dump($resultado);


