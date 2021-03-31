<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract function tableName(): string;
    abstract function attributes(): array;

    public function save()
    {
        $table = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($item) => ":$item", $attributes);
        $statement = $this->prepare("INSERT INTO $table (" . implode(',', $attributes) . ") VALUES
            (" . implode(',', $params) . ")
        ");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        return $statement->execute();
    }

    public function prepare(string $sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}