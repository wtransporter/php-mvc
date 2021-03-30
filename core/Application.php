<?php

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public Database $db;
    public static Application $app;

    public function __construct(array $config) {
        static::$app = $this;
        $this->db = new Database($config['database']);
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