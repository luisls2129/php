<?php

namespace controllers;

use core\Controller;
use models\Actor as modelActor;

class Actor extends Controller
{

    function getById($vars)
    {
        $actor = modelActor::getById($vars['id']);
        echo $this->templates->render('actores_ficha', ['actor' => $actor]);
    }
    

}
