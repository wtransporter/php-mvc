<?php

use app\core\Migration;

class m0002_add_password_to_users_table extends Migration
{
    public string $tableName = 'users';

    public function up()
    {
        $this->addColumn('password varchar(255) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('password');
    }
}