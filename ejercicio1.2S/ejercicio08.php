<?php
    $cadena = 'TRWAGMYFPDXBNJZSQVHLCKEO';
    $dni = 52452398;
    $numero = $dni%23;
    $letra = substr($cadena, $numero, 1);
    echo "El DNI es $dni$letra";
