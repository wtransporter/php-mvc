<?php

use app\core\Application;

if (! function_exists('view')) {
    function view(string $view, array $data = [])
    {
        return Application::$app->router->view($view, $data);
    }
}