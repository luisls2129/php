<?php

function multiplicar(...$numeros) {
    $resultado = 1;
    foreach ($numeros as $value) {
        $resultado *= $value;
    }
    echo "El resultado es $resultado<br>";
}

multiplicar(8);
multiplicar(3, 4);
multiplicar(2, 3, 5);
multiplicar(4, 6, 7, 9);