<?php

namespace app\core;

abstract class Migration
{
    public Database $db;

    public function __construct(Database $database) {
        $this->db = $database;
    }
    
    abstract public function up();
    abstract public function down();
}