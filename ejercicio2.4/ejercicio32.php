<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

        $numero = $_POST['numero'];

        function calcularFactorial($num){
            if ($num == 1)
            return 1;
        else 
            return $num * calcularFactorial($num-1);
        }

        $resultado = calcularFactorial($numero);

    ?>

    <form action="./ejercicio31.php" method="POST">
        <h1>Introduce un numero para calcular su factorial</h1>
        <p>Numero: <input type="text" name="numero"></p>
        <input type="submit" value="Calcular">
        <p class="resultado"> <?= $resultado ?> </p>
    </form>
</body>

</html>