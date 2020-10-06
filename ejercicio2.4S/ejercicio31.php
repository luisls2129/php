<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ejercicio 31</title>
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

    function factorial($numero) {
        $result = 1;
        for ($i=2; $i<=$numero;$i++) {
            $result = $i * $result;
        }
        return $result;
    }

    $num1 = $_POST["num1"] ?? null;
    if ($num1 != null) {
        $estilo = "style=display:block";
        $resultado = factorial($num1);
    }
?>
<body>
    <form method="post" action="./ejercicio31.php" align="center">
        <div id="wrapper">
            <div id="resultado" <?= $estilo ?>>El resultado es <?= $resultado ?></div>
            <div class="option">Número:</div><div class="option"><input type="text" name="num1"></input></div>
            <div class="option"><input type="submit" value="Factorial" /></div>
        </div>
    </form>
</body>
</html>