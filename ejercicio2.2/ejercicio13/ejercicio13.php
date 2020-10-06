<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css13.css">
    <title>Document</title>
</head>

<body>
    <?php
    
    $arrays = [];
    $contadoresLargo = "";
    $contenido = "";
    for ($largo=1; $largo < 10; $largo++) { 
        for ($ancho=1; $ancho < 10; $ancho++) { 
            $arrays[$largo][$ancho] = $largo*$ancho;
        }
    }

    for ($i=1; $i < 10; $i++) { 
        $contadoresLargo .= "<td><b>$i</b></td>";
    }

    foreach ($arrays as $key => $value) {
        $contenido .= "<tr><td><b>$key</b></td>";
        $array = $value;
        foreach ($array as $value) {
            $contenido .= "<td>$value</td>";
        }
    }

    echo "<table>
                <tr>
                    <td colspan=\"10\"><h1>Tablas de multiplicar</h1></td>
                </tr>
                <tr>
                    <td></td>
                    $contadoresLargo
                </tr>
                <tr>
                    $contenido
                </tr>
            </table>"
    ?>
</body>

</html>