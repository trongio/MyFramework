<?php

use app\Request;
use app\Router;
use app\controllers\LoginController;
use app\controllers\HomeController;
use app\controllers\RegisterController;

require_once __DIR__ . '/vendor/autoload.php';


$router = new Router(new Request());

$router->get('/', 'home');
$router->get('/about', 'about');

$router->get('/contact', 'contact');
$router->post('/contact', [HomeController::class, 'contact']);

$router->get('/login', 'login');
$router->post('/login', [LoginController::class,'login']);

$router->get('/register', 'register');
$router->post('/register', [RegisterController::class,'register']);