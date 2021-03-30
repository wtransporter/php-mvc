<?php
define('ROOT_DIR', dirname(__DIR__) . '/');
include_once '../bootstrap.php';

use app\core\Application;

$app = new Application($config);
$app->router->load('web');
$app->run();