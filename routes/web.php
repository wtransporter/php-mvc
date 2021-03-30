<?php

use app\controllers\PageController;

$router->get('/', function() {
    return 'Index';
});
$router->get('/contact', 'contact');
$router->get('/about', [PageController::class, 'about']);