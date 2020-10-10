<?php

namespace controllers;

use core\Controller;
use models\Libro as modelLibro;

class Libro extends Controller
{
    function getAll()
    {
        $libros = modelLibro::getAll();
        echo $this->templates->render('libros_listado', ['libros' =>
        $libros]);
    }
}
