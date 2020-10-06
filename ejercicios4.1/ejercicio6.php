<?php

class Calculadora{

    public $num1 = 8;

    public function sumar( $num2){

        return $this -> nombre + $num2;

    }

     public function restar( $num2){

        return $this -> nombre - $num2;

    }

     public function multiplicar( $num2){

        return $this -> nombre * $num2;

    }

     public function dividir( $num2){

        return $this -> nombre / $num2;

    }
    
}