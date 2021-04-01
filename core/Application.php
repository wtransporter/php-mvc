<?php

namespace app\core;

class Application
{
    public $userClass;
    public Router $router;
    public Request $request;
    public Database $db;
    public Session $session;
    public ?UserModel $authUser;
    public static Application $app;

    public function __construct(array $config) {
        static::$app = $this;
        $this->db = new Database($config['database']);
        $this->request = new Request();
        $this->session = new Session();
        $this->router = new Router($this->request);
        $this->userClass = new $config['userClass']();
        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass->primaryKey();
            $this->authUser = $this->userClass->find([$primaryKey => $primaryValue]);
        } else {
            $this->authUser = null;
        }
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

    public function login(UserModel $user)
    {
        $this->authUser = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->authUser = null;
        $this->session->remove('user');
    }
}