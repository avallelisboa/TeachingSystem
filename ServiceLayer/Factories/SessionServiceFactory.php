<?php
require_once './ServiceLayer/Interfaces/ISessionService.php';
require_once './ServiceLayer/Implementations/Session/PHPSessionService.php';
require_once './ServiceLayer/Implementations/Session/JWTSessionService.php';
class SessionServiceFactory {
    private static $service;
    public static function getSessionService($type) : ISessionService{
        switch ($type) {
            case 'php':
                if(is_null(self::$service))
                    self::$service = new PhpSessionService();

                return self::$service;
            case 'jwt':
                if(is_null(self::$service))
                    self::$service = new JWTSessionService();

                return self::$service;  
            default:
                throw new Exception("Invalid session service implementation: $type");
        }
    }
}