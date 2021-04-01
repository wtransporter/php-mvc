<?php

namespace app\models;

use app\core\UserModel;

class User extends UserModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function primaryKey(): string
    {
        return 'id';
    }

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
            'email' => 'required|email|unique:\\app\\models\\User',
            'password' => 'required',
            'passwordConfirm' => 'required'
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'E-mail',
            'password' => 'Password',
            'passwordConfirm' => 'Confirm password'
        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function displayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}