<?php
require_once('../../Models/ActionResult.php');
require_once('../../Interfaces/ISessionService.php');
require_once("../../../BusinessLayer/BusinessLogic/SessionBL.php");
class PHPSessionService implements ISessionService{
    public function login($username, $password): ActionResult{
        $validationResult = isLoginValid($username, $password);
        $actionResult = new ActionResult($validationResult->isValid,$validationResult->message);
        if($validationResult->isValid){
            session_start();
            $_SESSION["username"] = $username;
        }
        return $actionResult;
    }
    public function isLogged():bool{
        return isset($_SESSION["username"]);
    }
    public function logout(){
        unset($_SESSION["username"]);
        session_destroy();
    }
}