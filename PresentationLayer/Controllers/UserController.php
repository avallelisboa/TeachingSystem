<?php
require_once './ServiceLayer/Interfaces/ISessionService.php';
function GetUserMainMenu($request,$response,$service, $app){
    $SESSION_SERVICE = $_ENV['SESSION_SERVICE'];
    $sessionService = SessionServiceFactory::getSessionService('php');
    if($sessionService->isLogged())
        $service->render('./PresentationLayer/Views/UserPage.php');
    else $response->redirect('/')->send();
}