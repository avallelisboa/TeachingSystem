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
        $result = new ValidationResult(false, "");
        $username = trim($theUserName);

        if (empty($username)) {
            $result->message = "The username cannot be empty.";
        } 
        else if (strlen($username) < 5) {
            $result->message = "The username must be at least 5 characters long.";
        } 
        else if (strlen($username) > 20) {
            $result->message = "The username must not exceed 20 characters.";
        }
        else if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $result->message = "The username can only contain letters, numbers, and underscores.";
        }
        else if($this->userNameExists($username)){
            $result->message = "The username already exists";
        }
        else {
            $result->isValid = true;
            $result->message = "The username is valid.";
        }

        return $result;
    }
    private function isNameValid($theName):ValidationResult{
        $result = new ValidationResult(false,"");

        $name = trim($theName);

        if (empty($name)) {
            $result->message = "The name cannot be empty.";
        }

        else if (strlen($name) < 4) {
            $result->message = "The name must be at least 4 characters long.";
        }
        
        else if (strlen($name) > 50) {
            $result->message = "The name must not exceed 50 characters.";
        }

        else if (!preg_match("/^[a-zA-Z\s-]+$/", $name)) {
            $result->message = "The name can only contain letters, spaces, and hyphens.";
        }

        else {
            $result->message = "The name is valid.";
            $result->isValid = true;
        }

        return $result;
    }
    private static function isLastNameValid($theLastName):ValidationResult{
        $result = new ValidationResult(false, "");
        $lastName = trim($theLastName);

        if (empty($lastName)) {
            $result->message = "The last name cannot be empty.";
        } 
        else if (strlen($lastName) < 2) {
            $result->message = "The last name must be at least 2 characters long.";
        } 
        else if (strlen($lastName) > 50) {
            $result->message = "The last name must not exceed 50 characters.";
        }
        else if (!preg_match("/^[a-zA-Z\s-]+$/", $lastName)) {
            $result->message = "The last name can only contain letters, spaces, and hyphens.";
        }
        else {
            $result->isValid = true;
            $result->message = "The last name is valid.";
        }

        return $result;
    }
    private function emailExists($theEmail):bool{
        return $this->_userRepository->EmailExists($theEmail);
    }
    private function isEmailValid($theEmail):ValidationResult{
        $result = new ValidationResult(false, "");
        $email = trim($theEmail);

        if (empty($email)) {
            $result->message = "The email cannot be empty.";
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result->message = "The email format is invalid.";
        } 
        else if ($this->emailExists($email)) {
            $result->message = "The email is already registered.";
        } 
        else {
            $result->isValid = true;
            $result->message = "The email is valid.";
        }

        return $result;
    }
    private static function isPasswordValid($thePassword):ValidationResult{
        $result = new ValidationResult(false, "");
        $password = trim($thePassword);
        $maxLength = 30;
    
        if (empty($password)) {
            $result->message = "The password cannot be empty.";
        } 
        else if (strlen($password) < 8) {
            $result->message = "The password must be at least 8 characters long.";
        } 
        else if (strlen($password) > $maxLength) {
            $result->message = "The password must not exceed {$maxLength} characters.";
        }
        else {
            $result->isValid = true;
            $result->message = "The password is valid.";
        }
    
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
        $user = $this->_userRepository->GetUserByUserName($theUserName);
        return password_verify($thePassword, $user->getPassword());
    }
    public function IsLoginValid($theUserName, $thePassword):ValidationResult{
        $result = new ValidationResult(false,"");
        
        if(!$this->userNameExists($theUserName))
            $result->message = "The username is not registered";          
        
        else if(!($this->isPasswordCorrect($theUserName, $thePassword)))
            $result->message = "The password is not correct";
        
        else
            $result->isValid = true;
    
        return $result;
    }
}