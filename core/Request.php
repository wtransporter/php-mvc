<?php

namespace app\core;

class Request
{
    public function uri(): string
    {
        $position = strpos($_SERVER['REQUEST_URI'], '?');
        if (!$position === false) {
            return trim(substr($_SERVER['REQUEST_URI'], 0, $position), '/');
        }
        return trim($_SERVER['REQUEST_URI'], '/');
    }
    
    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isMethod(string $method): bool
    {
        return $this->method() === strtoupper($method);
    }

    public function all(): array
    {
        $params = [];
        if ($this->method() === 'GET') {
            foreach ($_GET as $key => $value) {
                $params[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'POST') {
            foreach ($_POST as $key => $value) {
                $params[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $params;
    }
}