<?php

include_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '\..\\'); //ignore 'Undefined type' error
$dotenv->load();

/*
define('DB_SERVER',   $_ENV['DB_SERVER']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME',     $_ENV['DB_NAME']);

define('STRIPE_SECRET_API_KEY',  $_ENV['STRIPE_SECRET_API_KEY']);
define('STRIPE_PUBLISHABLE_KEY', $_ENV['STRIPE_PUBLISHABLE_KEY']);
*/