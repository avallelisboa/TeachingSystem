<?php
require_once('../Interfaces/IPaymentsService.php');
require_once('../Implementations/Session/PHPSessionService.php');
class SessionServiceFactory {
    public static function getSessionService($method) : ISessionService{
        switch ($method) {
            case 'php':
                return new PHPSessionService();
            default:
                throw new Exception("Unsupported session methid: $method");
        }
    }
}