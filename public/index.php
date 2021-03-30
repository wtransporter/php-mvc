<?php

include_once '../bootstrap.php';

use app\core\Application;

$app = new Application();
$app->router->load('web');
$app->run();