<?php

namespace app\models;

use core\Model;

class Pelicula extends Model{
    protected $table = 'peliculas';

    protected function sacarD($idPeli){

        Model::belongsToMany();

    }

    protected function sacarDiretores($idPeli){
        $arrayPeliDirector = [];
        $pelicula_director = include('bbdd/pelicula_director.php');
        $directores = include('bbdd/directores.php');

        $expresionPeliDire = '[?contains(`["'.$idPeli.'"]`, id_pelicula)].{id_director:id_director}';
        
        $resultado = \JmesPath\search($expresionPeliDire,$pelicula_director);

        $expresionDire = '[?contains(`[';
        
        foreach ($resultado as $value) {
            $idValue = $value["id_director"];
            $expresionDire .= '"'.$idValue.'"'.",";
        }

        $expresionDire = substr($expresionDire,0,-1);
        $expresionDire .= ']`, id)].{id: id, nombre: nombre}';

        $resultadoDire = \JmesPath\search($expresionDire,$directores);
        
        foreach ($resultadoDire as $value) {
            array_push($arrayPeliDirector,$value);
        }

        return $arrayPeliDirector;
        

        
    }

    protected function sacarActores($idPeli){
        $arrayPeliActor = [];
        $pelicula_actor = include('bbdd/pelicula_actor.php');
        $actores = include('bbdd/actores.php');

        $expresionPeliAct = '[?contains(`["'.$idPeli.'"]`, id_pelicula)].{id_actor:id_actor}';

        $resultadoPeliAct = \JmesPath\search($expresionPeliAct,$pelicula_actor);

        $expresionAct = '[?contains(`[';
        
        foreach ($resultadoPeliAct as $value) {
            $idValue = $value["id_actor"];
            $expresionAct .= '"'.$idValue.'"'.",";
        }
        $expresionAct = substr($expresionAct,0,-1);
        $expresionAct .= ']`, id)].{id: id, nombre: nombre}';
        $resultadoAct = \JmesPath\search($expresionAct,$actores);
        
        foreach ($resultadoAct as $value) {
            array_push($arrayPeliActor, $value);
        }

        return $arrayPeliActor;
    }

}
