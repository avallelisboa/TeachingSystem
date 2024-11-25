<?php
require_once './ServiceLayer/Factories/RegisterServiceFactory.php';
function GetRegisterScreen($request,$response,$service, $app){
    setcookie("registerErrorMessage",null,time() - 3600);
    setcookie("registerResultMessage",null,time() - 3600);
    $service->render('./PresentationLayer/Views/Register.php');
}
function Register($request, $response,$service, $app){
    setcookie("registerErrorMessage",null,time() - 3600);
    setcookie("registerResultMessage",null,time() - 3600);

    $REGISTER_SERVICE = $_ENV['REGISTER_SERVICE'];
    $registerService = RegisterServiceFactory::getRegisterService($REGISTER_SERVICE);

    $userName = $request->paramsPost()->userName;
    $firstName = $request->paramsPost()->firstName;
    $lastName = $request->paramsPost()->lastName;
    $email = $request->paramsPost()->email;
    //TODO receive country from POST
    $country = "Uruguay";
    $password = $request->paramsPost()->password;
    $registerModel = new Register($userName,$firstName,$lastName,$email,$country,$password);

    $result = $registerService->register($registerModel);
    if($result->isValid){
        setcookie("registerResultMessage",$result->message,time() +86400);
        $response->redirect('/login')->send();
    }else{
        setcookie("registerErrorMessage",$result->message,time() +86400);
        $response->redirect('/register')->send();
    }
}