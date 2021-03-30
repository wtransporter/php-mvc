<?php

namespace app\core;

use app\core\exceptions\NotFoundException;

class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => []
    ];

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function load(string $fileName)
    {
        $router = $this;
        include_once ROOT_DIR . 'routes/' . $fileName . '.php';
    }
    
    public function get(string $uri, $callback)
    {
        $uri = trim($uri, '/');
        $this->routes['GET'][$uri] = $callback;
    }
    
    public function post(string $uri, $callback)
    {
        $uri = trim($uri, '/');
        $this->routes['POST'][$uri] = $callback;
    }

    public function resolve()
    {
        $uri = $this->request->uri();
        $method = $this->request->method();
        $callback = $this->routes[$method][$uri] ?? false;
        if (! $callback) {
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return $this->view($callback);
        }
        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
            if (! method_exists($callback[0], $callback[1])) {
                throw new NotFoundException("Action \"$callback[1]\" not found in controller");
            }
        }

        return call_user_func($callback);
    }

    public function view(string $view, array $data = [])
    {
        extract($data);
        include_once ROOT_DIR . 'views/' . $view . '.view.php';
    }
}