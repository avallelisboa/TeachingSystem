<?php
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\UnencryptedToken;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;

require_once('./ServiceLayer/Models/ActionResult.php');
require_once('./ServiceLayer/Models/Register.php');
require_once('./ServiceLayer/Interfaces/ISessionService.php');
require_once('./BusinessLayer/Entities/User.php');
require_once('./BusinessLayer/BusinessLogic/SessionBL.php');
require_once('./DataAccessLayer/Factories/AbstractRepositoriesFactory.php');

class JWTSessionService implements ISessionService{

    private $config;
    private $repositoriesFactory;
    private $userRepository;
    public function __construct(){
        $this->repositoriesFactory = AbstractRepositoriesFactory::GetFactory("mysql");
        $this->userRepository = $this->repositoriesFactory->MakeUserRepository();
        $this->config = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::plainText($_ENV["SECRET_KEY"])
        );
    }
    private function generateToken(array $claims):string{
        $now = new DateTimeImmutable();
        $token = $this->config->builder()
            ->issuedBy($_ENV["TOKEN_ISSUER"]) // Set the issuer
            ->permittedFor($_ENV["TOKEN_ISSUER"]) // Set the audience
            ->issuedAt($now)
            ->expiresAt($now->modify('+4 hour'))
            ->withClaim('userId', $claims['userId'])
            ->getToken($this->config->signer(), $this->config->signingKey());

        return $token->toString();
    }
    private function validateToken(string $token): bool
    {
        try {
            $token = $this->config->parser()->parse($token);

            if (!$token instanceof UnencryptedToken) {
                throw new Exception('Token is not valid.');
            }

            $constraints = $this->config->validationConstraints();
            if (!$this->config->validator()->validate($token, ...$constraints)) {
                return false;
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    function isLogged($token): bool{
        return $this->validateToken($token);
    }
    function login($username, $password): ActionResult{
        $validationResult = SessionBL::GetInstance()->IsLoginValid($username, $password);
        $actionResult = new ActionResult($validationResult->isValid,$validationResult->message);
        if($validationResult->isValid){
            $userClaims = ['userId' => $username];
            $actionResult->message = $this->generateToken($userClaims);
        }
        return $actionResult;
    }
    function logout(){

    }
}