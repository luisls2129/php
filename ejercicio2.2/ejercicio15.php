<?php

$menus = [
    [
        "primero" => "sopa",
        "segundo" => "carne",
        "postre" => "tarta"
    ],
    [
        "primero" => "ensalada",
        "segundo" => "carne",
    ],
    [
        "primero" => "macarrones",
        "segundo" => "pescado",
    ],
    [
        "primero" => "sopa",
        "segundo" => "pescado",
        "postre" => "flan"
    ],
];

$menuSinPostre = [];
foreach ($menus as $value) {
    if (!array_key_exists("postre",$value)) {
        array_push($menuSinPostre, $value);
    }
    
}

var_dump($menuSinPostre);
