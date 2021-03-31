<?php

namespace app\core\forms;

use app\core\Model;

class Form
{
    public static function open(string $action, string $method)
    {
        echo sprintf('<form class="row g-3" action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function close()
    {
        echo '</form>';
    }

    public function addField(Model $model, string $property)
    {
        return new InputField($model, $property);
    }
}