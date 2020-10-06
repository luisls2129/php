<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css12.css">
    <title>Document</title>
</head>
<body>

<?php

$array = [];
$tablaMultiplicadora = "";
$tablaResultados = "";

for ($i=1; $i < 10; $i++) { 
    array_push($array,(7*$i));
}

for ($i=1; $i < 10; $i++) { 
    $tablaMultiplicadora .= "<td>X$i</td>";

    $datoMostrar = $array[($i-1)];

    $tablaResultados .= "<td>$datoMostrar</td>";
}

echo "<table>
            <tr>
                <td colspan =\"9\"><h1>Tabla del multiplicar del 7</h1></td>
            </tr>
            <tr>
                $tablaMultiplicadora
            </tr>
            <tr>
                $tablaResultados
            </tr>
            
            
        </table>";

?>
    
</body>
</html>

