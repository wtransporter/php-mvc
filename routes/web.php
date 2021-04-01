<?php

use app\controllers\AuthController;
use app\controllers\PageController;

$router->get('/', [PageController::class, 'index']);
$router->get('/contact', [PageController::class, 'contact']);
$router->get('/about', [PageController::class, 'about']);
$router->get('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);