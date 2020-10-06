<?php
    const LIMITE = 100;
    $random = rand(1,LIMITE);

    $resultado = ($random % 2 == 0) ? "$random es par" : "$random es impar"; 

    echo $resultado;
