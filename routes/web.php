<?php

use app\controllers\PageController;

$router->get('/', [PageController::class, 'index']);
$router->get('/contact', [PageController::class, 'contact']);
$router->get('/about', [PageController::class, 'about']);