<?php

namespace core;

use League\Plates\Engine as PlatesEngine;

class Controller
{
    protected $templates;
    public function __construct(PlatesEngine $templates)
    {
        $this->templates = $templates;
    }
}
