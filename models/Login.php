<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class Login extends Model
{
    public string $email = '';
    public string $password = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'E-mail',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = (new User)->find(['email' => $this->email]);
        if (!$user || !password_verify($this->password, $user->password)) {
            Application::$app->session->setFlash('Wrong username or password.', 'danger');
            redirect('login');
        }

        return Application::$app->login($user);
    }
}