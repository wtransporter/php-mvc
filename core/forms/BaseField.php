<?php

namespace app\core\forms;

use app\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $property;

    public function __construct(Model $model, string $property) {
        $this->model = $model;
        $this->property = $property;
    }

    abstract public function renderfield();

    public function __toString()
    {
        return sprintf(
            '<label for="%s" class="form-label">%s</label>'.
            $this->renderfield().
            '<div class="invalid-feedback text">
                <small>%s</small>
            </div>',
            $this->property,
            $this->property,
            $this->model->firstError($this->property)
        );
    }
}