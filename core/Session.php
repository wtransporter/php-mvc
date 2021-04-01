<?php

namespace app\core;

class Session
{
    const FLASH_KEY = 'message';

    public function __construct()
    {
        session_start();
    }

    public function setFlash(string $message, string $type = 'success')
    {
        $_SESSION[self::FLASH_KEY] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function getFlash()
    {
        return $_SESSION[self::FLASH_KEY] ?? false;
    }

    public function clearFlash()
    {
        unset($_SESSION[self::FLASH_KEY]);
    }
}