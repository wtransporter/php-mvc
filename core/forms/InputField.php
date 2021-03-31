<?php

namespace app\core\forms;

use app\core\Model;

class InputField extends BaseField
{
    const TYPE_TEXT = 'text';
    const TYPE_PASSWORD = 'password';
    const TYPE_EMAIL = 'email';

    public string $type;

    public function __construct(Model $model, string $property)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $property);
    }

    public function password()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    
    public function email()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function renderField()
    {
        return sprintf('
            <input type="%s" class="form-control %s" id="%s" name="%s" value="%s">',
            $this->type,
            $this->model->hasError($this->property) ? ' is-invalid' : '',
            $this->property,
            $this->property,
            $this->model->{$this->property}
        );
    }
}