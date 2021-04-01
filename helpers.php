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

if (! function_exists('flash')) {
    function flash() {
        $session = Application::$app->session;
        if ($session->getFlash()) {
            echo sprintf(
                '<div class="alert alert-%s">
                    %s
                </div>',
                $session->getFlash()['type'],
                $session->getFlash()['message']
            );
            $session->clearFlash();
        }
    }
}