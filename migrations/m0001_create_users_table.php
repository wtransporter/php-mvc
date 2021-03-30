<?php

use app\core\Migration;

class m0001_create_users_table extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE users (
                id int(5) AUTO_INCREMENT PRIMARY KEY,
                firstname varchar(255) NOT NULL,
                lastname varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                created_at timestamp DEFAULT CURRENT_TIMESTAMP
            )";
        $this->db->pdo->exec($sql);
    }

    public function down()
    {
        $sql = 'DROP TABLE users';
        $this->db->pdo->exec($sql);
    }
}