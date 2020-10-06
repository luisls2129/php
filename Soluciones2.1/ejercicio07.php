<?php

    const LIMITE = 100;
    $numero = rand(1, LIMITE);
    $paridad = ($numero%2==0) ? "par" : "impar";
    echo "El número es $numero y es $paridad";
