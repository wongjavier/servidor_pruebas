<?php

use Symfony\Component\Dotenv\Dotenv;

const APP_DIRECTORY = __DIR__;

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env.test');