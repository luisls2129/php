<?php 

require __DIR__ . '/../vendor/autoload.php';

$templatesFolder = __DIR__ . '/../app/views';
$templates = League\Plates\Engine::create($templatesFolder);

include __DIR__ . ('/../routes/web.php');
