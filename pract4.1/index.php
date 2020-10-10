<?php 

require 'vendor/autoload.php';

$templates = \League\Plates\Engine::create('./views');

include ('routes/web.php');