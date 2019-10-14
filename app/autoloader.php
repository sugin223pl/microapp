<?php
date_default_timezone_set("Europe/Bucharest");
use \Dotenv\Dotenv as Dotenv;
use Josantonius\Session\Session;
Session::init(3600);
$dotenv = Dotenv::create(__DIR__);
$dotenv->load();
$dotenv->required(['API_TOKEN', 'APP_TOKEN']);
View::setBaseDir(__DIR__ . '/Resources/Views');
