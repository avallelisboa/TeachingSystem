<?php
require_once './BusinessLayer/Models/ValidationResult.php';
require_once './DataAccessLayer/Factories/AbstractRepositoriesFactory.php';
require_once './DataAccessLayer/Interfaces/IUserRepository.php';

class SessionBL {
    private static $_instance;
    private $_userRepository;
    private function __construct() {
        $repositoryFactory = AbstractRepositoriesFactory::GetFactory('mysql')::GetInstance();
        $this->_userRepository = $repositoryFactory->MakeUserRepository();
    }
    public static function GetInstance(){
        if(self::$_instance == null)
            self::$_instance = new SessionBL();

        return self::$_instance;
    }
    private function userNameExists($theUserName):bool{
        return $this->_userRepository->UserNameExists($theUserName);
    }
    private function isUserNameValid($theUserName):ValidationResult{
        $result = new ValidationResult(false,"");
        return $result;
    }
    private function isNameValid($theName):ValidationResult{
        $result = new ValidationResult(false,"");
        return $result;
    }
    private static function isLastNameValid($theLastName):ValidationResult{
        $result = new ValidationResult(false,"");
        return $result;
    }
    private function emailExists($theEmail):bool{
        
        return false;
    }
    private function isEmailValid($theEmail):ValidationResult{
        $result = new ValidationResult(false,"");
        return $result;
    }
    private static function isPasswordValid($thePassword):ValidationResult{
        $result = new ValidationResult(false,"");
        return $result;
    }
    public function IsRegisterValid($register):ValidationResult{
        $result = new ValidationResult(false,"");

        $userNameResult = $this->isUserNameValid($register->userName);
        $nameResult = $this->isNameValid($register->name);
        $lastNameResult = $this->isLastNameValid($register->lastName);
        $emailResult = $this->isEmailValid($register->email);
        $passwordResult = $this->isPasswordValid($register->password);

        $result->isValid = $userNameResult->isValid && $nameResult->isValid && $lastNameResult->isValid && $emailResult->isValid && $passwordResult->isValid;
        if($result->isValid)
            $result->message = "The data is all correct";
        else{
            if(!($userNameResult->isValid))
                $result->message += $userNameResult->message + " ";
            if(!($nameResult->isValid))
                $result->message += $nameResult->message + " ";
            if(!($lastNameResult->isValid))
                $result->message += $lastNameResult->message + " ";
            if(!($emailResult->isValid))
                $result->message += $emailResult->message + " ";
            if(!($passwordResult->isValid))
                $result->message += $passwordResult->message;
        }
    
        return $result;
    }
    private function isPasswordCorrect($theUserName, $thePassword):bool{

        return false;
    }
    public function IsLoginValid($theUserName, $thePassword):ValidationResult{
        $result = new ValidationResult(false,"The login data was not valid");
    
    
    
        return $result;
    }
}