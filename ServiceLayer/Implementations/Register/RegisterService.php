<?php
require_once('./ServiceLayer/Models/ActionResult.php');
require_once('./ServiceLayer/Models/Register.php');
require_once('./ServiceLayer/Interfaces/IRegisterService.php');
require_once('./BusinessLayer/Entities/User.php');
require_once('./BusinessLayer/BusinessLogic/SessionBL.php');
require_once('./DataAccessLayer/Factories/AbstractRepositoriesFactory.php');

class RegisterService implements IRegisterService{
    private $repositoriesFactory;
    private $userRepository;
    public function __construct(){
        $this->repositoriesFactory = AbstractRepositoriesFactory::GetFactory("mysql");
        $this->userRepository = $this->repositoriesFactory->MakeUserRepository();
    }

    public function register(Register $registerModel):ActionResult{
        $validationResult = SessionBL::GetInstance()->IsRegisterValid($registerModel);
        if(!($validationResult->isValid))
            return new ActionResult($validationResult->isValid,$validationResult->message);
        else{
            $user = new User(
                0,$registerModel->userName,
                password_hash($registerModel->password,PASSWORD_DEFAULT),
                $registerModel->firstName,$registerModel->lastName,
                $registerModel->email,"",true, false
            );
            try{
                $this->userRepository->AddUser($user);
            }catch(Exception $ex){
                //Todo implement logging
                return new ActionResult(false, "Hubo un error en el servidor");
            }
            return new ActionResult($validationResult->isValid, "El usuario fue registrado correctamente");
        }
    }
}