<?php
require_once __DIR__ . '/vendor/autoload.php';

require_once('./PresentationLayer/Controllers/LoginController.php');
require_once('./PresentationLayer/Controllers/RegisterController.php');

require_once('./ServiceLayer/Factories/SessionServiceFactory.php');
require_once('./ServiceLayer/Interfaces/ISessionService.php');


$klein = new \Klein\Klein();

//GET
$klein->respond('GET', '/', function ($request,$response,$service, $app) {
    $service->render('/PresentationLayer/Views/Home.php');
});
$klein->respond('GET', '/login', function ($request,$response,$service, $app) {
    $service->render('/PresentationLayer/Views/Login.php');
});
$klein->respond('GET', '/register', function ($request,$response,$service, $app) {
    $service->render('/PresentationLayer/Views/Register.php');
});
$klein->respond('GET','/main', function ($request,$response,$service, $app) {
    $sessionService = SessionServiceFactory::getSessionService($_ENV['SESSION_SERVICE']);
    if($sessionService->isLogged())
        $service->render('/PresentationLayer/Views/UserMainPage.php');
    else header("Location: /");
});
//POST
$klein->respond('POST', '/login', function ($request,$response,$service, $app) {
    setcookie("loginErrorMessage",null,time() - 3600);
    $sessionService = SessionServiceFactory::getSessionService($_ENV['SESSION_SERVICE']);
    $username = "";
    $password = "";
    $result = $sessionService->login($username,$password);
    if($result->isValid){
        header("Location: /main");
    }else{
        setcookie("loginErrorMessage",$result->message,time() +86400);
    }
});

$klein->dispatch();