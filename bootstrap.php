<?php

include_once ROOT_DIR . 'vendor/autoload.php';
include_once ROOT_DIR . 'helpers.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIR);
$dotenv->load();

$config = include_once ROOT_DIR . 'config/app.php';