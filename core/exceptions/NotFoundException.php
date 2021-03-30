<?php

namespace app\core\exceptions;

class NotFoundException extends \Exception
{
    public $message = 'Page not found.';
    public $code = 404;
}