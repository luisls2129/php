<?php
namespace app\controllers;

use core\Controller;

class Main extends Controller{

    public function notFound(){
        $data = NULL;
        $this->echoResponse(true, 404, $data);
    }

    public function notAllowed(){
        $data = NULL;
        $this->echoResponse(true, 405, $data);
    }
    
}
