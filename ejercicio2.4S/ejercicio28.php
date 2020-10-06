<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Tablas multiplicar</title>
</head>
<style>

    #wrapper {
        border-radius: 3px;
        border: 1px solid #ccc;
        background: #fff;
        width: 275px;
        margin: 0 auto;
    }
    .option {
        display: inline-block;
        padding: 10px;
    }

    #resultado {
        text-align: center;
        padding: 10px;
    }
</style>
<?php
    $estilo = "style=display:none";
    $num1 = $_POST["num1"] ?? null;
    $num2 = $_POST["num2"] ?? null;
    if ($num1 != null && $num2 != null) {
        $estilo = "style=display:block";
        $operacion = strip_tags($_POST["operacion"]);
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'mult':
                $resultado = $num1 * $num2;
                break;
            case 'div':
                $resultado = $num1 / $num2;
                break;
            default:
                $resultado = "Operación inválida";
                break;
        }
    }
?>
<body>
    <form method="post" action="./ejercicio28.php" align="center">
        <div id="wrapper">
            <div id="resultado" <?= $estilo ?>>El resultado es <?= $resultado ?></div>
            <div class="option">Número 1:</div><div class="option"><input type="text" name="num1"></input></div>
            <div class="option">Número 2:</div><div class="option"><input type="text" name="num2"></input></div>
            <div class="option" style="display:block">
                <input type="radio" name="operacion" value="suma" checked>+</input>
                <input type="radio" name="operacion" value="resta">-</input>
                <input type="radio" name="operacion" value="mult">*</input>
                <input type="radio" name="operacion" value="div">/</input>
            </div>
            <div class="option"><input type="submit" value="Calcular" /></div>
        </div>
    </form>
</body>
</html>