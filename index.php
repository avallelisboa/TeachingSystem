<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once('./PresentationLayer/Controllers/LoginController.php');
require_once('./PresentationLayer/Controllers/RegisterController.php');
require_once('./PresentationLayer/Controllers/UserController.php');

require_once('./ServiceLayer/Interfaces/ISessionService.php');
require_once('./ServiceLayer/Factories/SessionServiceFactory.php');


$klein = new \Klein\Klein();

//GET
$klein->respond('GET', '/', function ($request,$response,$service, $app) {
    $service->render('./PresentationLayer/Views/Home.php');
});
$klein->respond('GET', '/login', "GetLoginScreen");
$klein->respond('GET', '/register', "GetRegisterScreen");
$klein->respond('GET','/main', "GetUserMainMenu");
//POST
$klein->respond('POST', '/login', "Login");
$klein->respond('POST', '/register', "Register");

$klein->dispatch();