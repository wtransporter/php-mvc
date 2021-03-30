<?php

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;

    public function __construct() {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->view('error', [
                'exception' => $e
            ]);
        }
    }
}