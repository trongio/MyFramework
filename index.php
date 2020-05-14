<?php

use app\Request;
use app\Router;
use app\controllers\HomeController;

require_once __DIR__ . '/vendor/autoload.php';


$router = new Router(new Request());

$router->get('/', 'home');

$router->get('/about', 'about');

$router->get('/contact', 'contact');

$router->post('/contact', [HomeController::class, 'contact']);
