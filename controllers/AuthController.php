<?php

namespace app\controllers;

use app\core\Request;
use app\models\User;

class AuthController
{
    public function login()
    {
        $user = new User();
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
                redirect('login');
            }
        }
        return view('auth.register', [
            'model' => $user
        ]);
    }
}