<?php

use app\core\Migration;

class m0002_add_password_to_users_table extends Migration
{
    public function up()
    {
        $sql = "ALTER TABLE users ADD COLUMN password varchar(255) NOT NULL";
        $this->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "ALTER TABLE users DROP COLUMN password";
        $this->db->pdo->exec($sql);
    }
}