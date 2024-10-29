<?php
require_once './ServiceLayer/Interfaces/ISessionService.php';
function GetUserMainMenu($request,$response,$service, $app){
    $SESSION_SERVICE = $_ENV['SESSION_SERVICE'];
    $sessionService = SessionServiceFactory::getSessionService('php');
    if($sessionService->isLogged()){
        $environment = $_ENV['ENVIRONMENT'];
        if($environment == "development")
            $response->redirect('http://localhost:3000')->send();
        else
            $service->render('./PresentationLayer/Views/UserPage/public/index.html');
    }
    else $response->redirect('/')->send();
}