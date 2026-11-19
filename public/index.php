<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\DefaultController;
use App\Controller\GameController;
use App\Controller\SecurityController;
use App\Routing;

$routing = new Routing();

$routing->get('/', SecurityController::class, 'login');
$routing->get('/login', SecurityController::class, 'login');
$routing->get('/register', SecurityController::class, 'register');
$routing->post('/register', SecurityController::class, 'register');
$routing->get('/home', DefaultController::class, 'index');
$routing->get('/game/{id}', GameController::class, 'show');

$routeFound = $routing->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI'],
);

if (!$routeFound) {
    http_response_code(404);
    (new DefaultController())->notFound();
}
