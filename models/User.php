<?php

namespace app\models;

use app\core\DbModel;

class User extends DbModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password'
        ];
    }

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

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }
}