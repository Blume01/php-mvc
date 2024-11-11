<?php

require_once __DIR__ . '/core/Autoloader.php';

use Core\Router;
use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\RegisterController;

$router = new Router();

$router->add('/', [new AuthController(), 'index']);
$router->add('/login', [new AuthController(), 'login']);
$router->add('/logout', [new AuthController(), 'logout']);

$router->add('/register', [new RegisterController(), 'index']);
$router->add('/create', [new RegisterController(), 'register']);

$router->add('/user/{id}', [new UserController(), 'show']);

$router->add('/home', [new HomeController(), 'index']);

$url = isset($_GET['url']) ? '/' . rtrim($_GET['url'], '/') : '/';

$router->dispatch($url);