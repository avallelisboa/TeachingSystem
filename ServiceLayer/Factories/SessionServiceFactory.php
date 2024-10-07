<?php
require_once './ServiceLayer/Interfaces/IPaymentService.php';
require_once './ServiceLayer/Implementations/Session/PHPSessionService.php';
class SessionServiceFactory {
    private static $phpService;
    public static function getSessionService($method) : ISessionService{
        switch ($method) {
            case 'php':
                if(is_null(self::$phpService))
                    self::$phpService = new PhpSessionService();

                return self::$phpService;
            default:
                throw new Exception("Unsupported session methid: $method");
        }
    }
}