<?php

namespace app\core;

abstract class Migration
{
    public Database $db;
    public string $tableName = '';

    public function __construct(Database $database) {
        $this->db = $database;
    }
    
    abstract public function up();
    abstract public function down();

    public function createTable(string $fields)
    {
        $this->db->pdo->exec("CREATE TABLE $this->tableName (
                $fields
            )");
    }
    
    public function dropTable()
    {
        $this->db->pdo->exec("DROP TABLE $this->tableName");
    }
    
    public function addColumn(string $field)
    {
        $this->db->pdo->exec("ALTER TABLE $this->tableName ADD COLUMN $field");
    }
    
    public function dropColumn(string $field)
    {
        $this->db->pdo->exec("ALTER TABLE $this->tableName DROP COLUMN $field");
    }
}