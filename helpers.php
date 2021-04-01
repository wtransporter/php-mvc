<?php

use app\core\Application;

if (! function_exists('view')) {
    function view(string $view, array $data = [])
    {
        return Application::$app->router->view($view, $data);
    }
}

if (! function_exists('redirect')) {
    function redirect(string $path)
    {
        header('Location: /' . trim($path, '/'));
        exit;
    }
}