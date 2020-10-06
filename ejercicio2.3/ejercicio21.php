<?php

function mostrarFrase($frase = "Hola mundo"){
    return $frase;
}

echo mostrarFrase("hola que tal");
echo "<br>" . mostrarFrase();