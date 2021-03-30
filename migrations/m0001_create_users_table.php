<?php

use app\core\Migration;

class m0001_create_users_table extends Migration
{
    public string $tableName = 'users';

    public function up()
    {
        $fields = 'id int(5) AUTO_INCREMENT PRIMARY KEY,
                firstname varchar(255) NOT NULL,
                lastname varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                created_at timestamp DEFAULT CURRENT_TIMESTAMP';
        $this->createTable($fields);
    }

    public function down()
    {
        $this->dropTable();
    }
}