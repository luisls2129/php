<?php

namespace app\controllers;

use core\Controller;
use app\models\Actor as modelActor;

class Actor extends Controller
{


    function getAll()
    {
        $actores = modelActor::all();
        echo $this->templates->render('actores', ['actores' => $actores]);
    }

    function getById($vars){
        $actor = modelActor::find($vars['id']);
        echo $this->templates->render('actores_ficha', ['actor' => $actor]);
    }
    

}
