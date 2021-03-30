<?php

use app\controllers\PageController;

$router->get('/', 'index');
$router->get('/contact', 'contact');
$router->get('/about', [PageController::class, 'about']);