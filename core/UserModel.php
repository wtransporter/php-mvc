<?php

namespace app\core;

abstract class UserModel extends DbModel
{
    abstract public function displayName(): string;
}