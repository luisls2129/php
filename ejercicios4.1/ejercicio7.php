<?php

class Calculadora{

    static private $num1 = 8;

    public function sumar( $num2){

        return self::$num1 + $num2;

    }

     public function restar( $num2){

        return self::$num1 - $num2;

    }

     public function multiplicar( $num2){

        return self::$num1 * $num2;

    }

     public function dividir( $num2){

        return self::$num1 / $num2;

    }

    public static function __callStatic($name, $arguments){
        return (new static)->$name(...$arguments);
    }
    
}

echo Calculadora::sumar(5);