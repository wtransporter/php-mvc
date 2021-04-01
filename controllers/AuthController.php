<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\models\Login;
use app\models\User;

class AuthController
{
    public function login(Request $request)
    {
        $user = new Login();
        if ($request->isMethod('POST')) {
            $user->loadData($request->all());
            if ($user->validate() && $user->login()) {
                redirect('/');
            }
        }
        return view('auth.login', [
            'model' => $user
        ]);
    }
    
    public function register(Request $request)
    {
        $user = new User();
        if ($request->isMethod('POST')) {
            $user->loadData($request->all());
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('You are successfully registered. You can login now.');
                redirect('login');
            }
        }
        return view('auth.register', [
            'model' => $user
        ]);
    }

    public function logout()
    {
        Application::$app->logout();
        Application::$app->session->setFlash('You have successfully logged out');
        redirect('/');
    }
}