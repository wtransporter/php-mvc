<?php

namespace app\core;

abstract class Model
{
    const RULE_REQUIRED = 'required';
    const RULE_EMAIL = 'email';
    const RULE_UNIQUE = 'unique';

    public array $errors = [];

    abstract function rules(): array;
    abstract function labels(): array;

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
        foreach ($this->rules() as $property => $value) {
            $rules = explode('|', $value);
            $value = $this->{$property};
            foreach ($rules as $key) {
                $rule = explode(':', $key);
                if ($rule[0] === self::RULE_REQUIRED && $value === '') {
                    $this->addError($property, $rule[0]);
                }
                if ($rule[0] === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($property, $rule[0]);
                }
                if ($rule[0] === self::RULE_UNIQUE) {
                    $db = Application::$app->db;
                    $class = $rule[1];
                    $table = (new $class)->tableName();
                    $statement = $db->pdo->prepare("SELECT * FROM $table WHERE $property=:$property");
                    $statement->bindValue(":$property", $value);
                    $statement->execute();
                    $rec = $statement->fetchObject();
                    if ($rec) {
                        $this->addError($property, $rule[0], $this->label($property));
                    }
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
            self::RULE_UNIQUE => 'This {unique} already exists in database',
        ];
    }

    public function addError(string $property, string $type, $field = '')
    {      
        $message = str_replace("{{$type}}", $field, $this->errorMessages()[$type]);
        $this->errors[$property][] = $message;
    }

    public function hasError(string $property): bool
    {
        return isset($this->errors[$property]);
    }

    public function firstError(string $property)
    {
        return $this->errors[$property][0] ?? false;
    }

    public function label(string $property)
    {
        return $this->labels()[$property] ?? $property;
    }
}