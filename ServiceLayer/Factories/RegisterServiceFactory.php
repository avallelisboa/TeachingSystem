<?php
require_once './ServiceLayer/Interfaces/IRegisterService.php';
require_once './ServiceLayer/Implementations/Register/RegisterService.php';
class RegisterServiceFactory{
    private static $registerService;
    public static function getRegisterService($type) : IRegisterService{
        switch ($type){
            case 'default':
                if(is_null(self::$registerService))
                    self::$registerService = new RegisterService();

                return self::$registerService;
            default:
                throw new Exception("Invalid register service implementation: $type");
        }
    }
}