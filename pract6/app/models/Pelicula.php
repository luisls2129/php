<?php

namespace app\models;

use core\Model;

class Pelicula extends Model{
    protected $table = 'peliculas';

    protected function getDirect($idPeli){

        return model::belongsToMany("directores", "pelicula_director", "id_pelicula", "id_director", $idPeli, "id");

    }

    protected function getAct($idPeli){

        return model::belongsToMany("actores", "pelicula_actor", "id_pelicula", "id_actor", $idPeli, "id");

    }

    protected function getCriticas($idPeli){
        return model::hasMany("criticas","id_pelicula",$idPeli);
    }

}
