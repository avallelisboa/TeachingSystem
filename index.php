<?php
require_once('./ServiceLayer/Factories/SessionFactory.php');
require_once('./ServiceLayer/Interfaces/ISessionService.php');

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => './PresentationLayer/Views/home.php',
    '/login' => './PresentationLayer/Views/Login.php',
    '/register' => './PresentationLayer/Views/Register.php'
];

if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    header('Location: /' );
}