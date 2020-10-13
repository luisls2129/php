<?php

namespace controllers;

use core\Controller;
use models\Director as modelDirector;

class Director extends Controller
{

    function getById($vars)
    {
        $director = modelDirector::getById($vars['id']);
        echo $this->templates->render('directores_ficha', ['director' => $director]);
    }
    

}
