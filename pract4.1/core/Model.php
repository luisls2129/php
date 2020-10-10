<?php

namespace core;

use function JmesPath\search;

class Model
{
    protected $table;
    protected function getAll()
    {
        $result = include('./bbdd/' . $this->table);
        return $result;
    }
    protected function getById($id)
    {
        $result = array();
        $rows = include('./bbdd/' . $this->table);
        $expression = "[?id == `" . $id . "`]";
        $result = \JmesPath\search($expression, $rows)[0];
        return $result;
    }
    public static function __callStatic($name, $arguments)
    {
        return (new static)->$name(...$arguments);
    }
}
