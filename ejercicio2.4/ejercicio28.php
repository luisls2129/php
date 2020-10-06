<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $resultado = "";

    $num1 = $_POST["numero1"] ?? null;
    $num2 = $_POST["numero2"] ?? null;

    if ($num1 != null && $num2 != null) {

        $operacion = $_POST["operacion"];
        switch ($operacion) {
            case 'sumar':
                $resultado = $num1 + $num2;
                break;
            case 'restar':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicar':
                $resultado = $num1 * $num2;
                break;
            case 'dividir':
                $resultado = $num1 / $num2;
                break;
        }
    }

    ?>

    <style>
        form {
            border: 1px solid black;
            width: 300px;
            margin: auto;
            text-align: center;
        }
    </style>
    <form action="http://localhost/DWS/ejercicio2.4/ejercicio28.php" method="post">

        <h1 class="resultado">Resultado = <?= $resultado ?></h1>

        <p> Numero 1 : <input type="number" name="numero1"></p>
        <p> Numero 2 : <input type="number" name="numero2"></p>

        <p>
            <label for="sumar">+</label>
            <input type="radio" name="operacion" value="sumar">

            <label for="restar">-</label>
            <input type="radio" name="operacion" value="restar">

            <label for="multiplicar">*</label>
            <input type="radio" name="operacion" value="multiplicar">

            <label for="dividir">/</label>
            <input type="radio" name="operacion" value="dividir">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>


</body>

</html>