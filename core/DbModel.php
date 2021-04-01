<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract function primaryKey(): string;
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

    public function find(array $where)
    {
        $table = $this->tableName();
        $attributes = array_keys($where);
        $sql = implode(" AND ", array_map(fn($item) => "$item=:$item", $attributes));
        $statement = $this->prepare("SELECT * FROM $table WHERE $sql");
        foreach ($where as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        $statement->execute();
        return $statement->fetchObject(get_class($this));
    }
}