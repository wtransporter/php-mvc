<?php

use app\controllers\AuthController;
use app\controllers\PageController;

$router->get('/', [PageController::class, 'index']);
$router->get('/contact', [PageController::class, 'contact']);
$router->get('/about', [PageController::class, 'about']);
$router->get('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);