<?php
namespace app\models;

use core\Model;
use core\db\DB;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    
    protected function getDirectores($id_pelicula) {
        return $this->belongsToMany('directores', 'pelicula_director', 
            'id_pelicula', 'id_director', $id_pelicula);
    }

    protected function getActores($id_pelicula) {
        return $this->belongsToMany('actores', 'pelicula_actor', 
            'id_pelicula', 'id_actor', $id_pelicula);
    }

    protected function getCriticas($id_pelicula) {
        return $this->hasMany('criticas', 'id_pelicula', $id_pelicula);
    }

}
