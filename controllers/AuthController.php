<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;

class AuthController
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function register(Request $request)
    {
        $user = new User();
        if ($request->isMethod('POST')) {
            $user->loadData($request->all());
        }
        return view('auth.register');
    }
}