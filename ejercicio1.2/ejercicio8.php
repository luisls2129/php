<?php
    $dni = 26762403;
    $cadenaLetras = 'TRWAGMYFPDXBNJZSQVHLCKEO';
    $resto = $dni % 23;
    
    $letraDNI = substr($cadenaLetras,$resto,1);

    echo "La letra del DNI $dni es, $letraDNI";
?>