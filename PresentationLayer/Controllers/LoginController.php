<?php
function GetLoginScreen($request,$response,$service, $app){
    $service->render('./PresentationLayer/Views/Login.php');
}
function Login($request,$response,$service, $app){
    setcookie("loginErrorMessage",null,time() - 3600);
    $SESSION_SERVICE = $_ENV['SESSION_SERVICE'];
    $sessionService = SessionServiceFactory::getSessionService('php');
    $userName = $request->paramsPost()->userName;
    $password = $request->paramsPost()->password;
    $result = $sessionService->login($userName,$password);
    if($result->isValid){
        $response->redirect('/main')->send();
    }else{
        setcookie("loginErrorMessage",$result->message,time() +86400);
        $response->redirect('/login')->send();
    }
}