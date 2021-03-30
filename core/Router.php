<?php

namespace app\core;

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
            return "Not found";
        }
        
        return call_user_func($callback);
    }
}