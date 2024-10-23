<?php
require_once('./ServiceLayer/Models/ActionResult.php');
require_once('./ServiceLayer/Models/Register.php');
require_once('./ServiceLayer/Interfaces/ISessionService.php');
require_once('./BusinessLayer/Entities/User.php');
require_once('./BusinessLayer/BusinessLogic/SessionBL.php');
require_once('./DataAccessLayer/Factories/AbstractRepositoriesFactory.php');
class PHPSessionService implements ISessionService{
    private $repositoriesFactory;
    private $userRepository;
    public function __construct(){
        $this->repositoriesFactory = AbstractRepositoriesFactory::GetFactory("mysql");
        $this->userRepository = $this->repositoriesFactory->MakeUserRepository();
    }

    public function register(Register $registerModel):ActionResult{
        $validationResult = SessionBL::GetInstance()->IsRegisterValid($registerModel);
        $actionResult = new ActionResult($validationResult->isValid,$validationResult->message);
        if($validationResult->isValid){
            $user = new User(
                0,$registerModel->userName,
                password_hash($registerModel->password,PASSWORD_DEFAULT),
                $registerModel->firstName,$registerModel->lastName,
                $registerModel->email,true, false
            );
            $this->userRepository->AddUser($user);
        }
        return $actionResult;
    }
    public function login($username, $password): ActionResult{
        $validationResult = SessionBL::GetInstance()->IsLoginValid($username, $password);
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