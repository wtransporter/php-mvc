<?php

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public static Application $app;

    public function __construct() {
        static::$app = $this;
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