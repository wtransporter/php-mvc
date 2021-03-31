<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function rules(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'passwordConfirm' => 'required'
        ];
    }
}