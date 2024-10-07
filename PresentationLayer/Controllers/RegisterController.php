<?php

function GetRegisterScreen($request,$response,$service, $app){
    $service->render('./PresentationLayer/Views/Register.php');
}
function Register($request, $response,$service, $app){
    setcookie("registerErrorMessage",null,time() - 3600);
    setcookie("registerResultMessage",null,time() - 3600);

    $SESSION_SERVICE = $_ENV['SESSION_SERVICE'];
    $sessionService = SessionServiceFactory::getSessionService('php');

    $email = $request->paramsPost()->email;
    $firstName = $request->paramsPost()->firstName;
    $lastName = $request->paramsPost()->lastName;
    $email = $request->paramsPost()->email;
    $password = $request->paramsPost()->password;
    $registerModel = new Register($email,$firstName,$lastName,$email,$password);

    $result = $sessionService->register($registerModel);
    if($result->isValid){
        setcookie("registerResultMessage",$result->message,time() +86400);
        $response->redirect('/login')->send();
    }else{
        setcookie("registerErrorMessage",$result->message,time() +86400);
        $response->redirect('/register')->send();
    }
}