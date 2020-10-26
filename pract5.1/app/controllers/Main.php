<?php

namespace app\controllers;

use core\Controller;

class Main extends Controller
{

    function index(){
        echo $this->templates->render('index');
    }
    
    function error(){
        echo $this->templates->render('error');
    }
}
