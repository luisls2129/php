<?php
    $num1 = 110;
    $num2 = 5;

    $resultadoNave = $num1 <=> $num2;
    $resultadorMostrar = "El numero mas grande es ";

    switch ($resultadoNave) {
        case '-1':
            $resultadorMostrar .= $num2;
            break;
        case '1': 
            $resultadorMostrar .= $num1;
            break;
        default:
            $resultadorMostrar = "Los números son iguales";
            break;
    }
    
    echo $resultadorMostrar;
?>