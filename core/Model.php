<?php

namespace app\core;

abstract class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';

    public array $errors = [];

    abstract function rules(): array;

    public function loadData(array $params)
    {
        foreach ($params as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

    public function validate()
    {
        foreach ($this->rules() as $property => $rule) {
            $rules = explode('|', $rule);
            $value = $this->{$property};
            foreach ($rules as $key) {
                if ($key === self::RULE_REQUIRED && $value === '') {
                    $this->addError($property, $key);
                }
                if ($key === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($property, $key);
                }
            }
        }
        return empty($this->errors);
    }

    public function errorMessages():array
    {
        return [
            self::RULE_REQUIRED => 'This field is required',
            self::RULE_EMAIL => 'This field must be valid email address',
        ];
    }

    public function save()
    {
        return true;
    }

    public function addError(string $property, string $type)
    {      
        $this->errors[$property][] = $this->errorMessages()[$type];
    }

    public function hasError(string $property): bool
    {
        return isset($this->errors[$property]);
    }

    public function firstError(string $property)
    {
        return $this->errors[$property][0] ?? false;
    }
}