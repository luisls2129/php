<?php

include "ejercicio17a.php";

$edades = [
    "mayor" => [
        "nombre" => $empleados[0]["nombre"],
        "edad" => $empleados[0]["edad"]
    ],
    "menor" => [
        "nombre" => $empleados[0]["nombre"],
        "edad" => $empleados[0]["edad"]
    ]
];

foreach ($empleados as $value) {
    if ($value["edad"] < $edades["menor"]["edad"]) {
        $edades["menor"]["edad"] = $value["edad"];
        $edades["menor"]["nombre"] = $value["nombre"];
    } elseif ($value["edad"] > $edades["mayor"]["edad"]) {
        $edades["mayor"]["edad"] = $value["edad"];
        $edades["mayor"]["nombre"] = $value["nombre"];
    }
}

var_dump($edades);