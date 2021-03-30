<?php

namespace app\core;

class Router
{
    public function load(string $fileName)
    {
        $router = $this;
        include_once ROOT_DIR . 'routes/' . $fileName . '.php';
    }
    
    public function get()
    {

    }
}