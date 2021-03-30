<?php
define('ROOT_DIR', __DIR__ . '/');
include_once 'bootstrap.php';

use app\core\Application;

$app = new Application($config);
$app->db->runMigrations();
