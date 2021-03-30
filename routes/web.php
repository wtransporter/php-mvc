<?php

$router->get('/', function() {
    return 'Index';
});
$router->get('/contact', 'contact');