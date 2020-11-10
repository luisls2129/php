<?php

namespace app\controllers;

use core\Controller;

class Main extends Controller
{

    function index(){
        json_encode("index");
    }
    
    function error(){
        echo json_encode("Error");
    }
}
