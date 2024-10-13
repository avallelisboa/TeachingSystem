<?php
require_once './DataAccessLayer/Factories/MySqlRepositoryFactory.php';
require_once './DataAccessLayer/Interfaces/IClassLiveSessionRepository.php';
require_once './DataAccessLayer/Interfaces/ICourseRepository.php';
require_once './DataAccessLayer/Interfaces/ILessonRepository.php';
require_once './DataAccessLayer/Interfaces/IPaymentRepository.php';
require_once './DataAccessLayer/Interfaces/ISubjectRepository.php';
require_once './DataAccessLayer/Interfaces/IUserRepository.php';

abstract class AbstractRepositoriesFactory{
    
    public static function GetFactory($implementatioName){
        switch($implementatioName){
            case 'mysql':
                return MySqlRepositoryFactory::GetInstance();
            default:
                throw new Exception('Unsupported repository implementation.');
        }
    }
    abstract public function MakeClassLiveSessionRepository():IClassLiveSessionRepository;
    abstract public function MakeCourseRepository():ICourseRepository;
    abstract public function MakeLessonRepository():ILessonRepository;
    abstract public function MakePaymentRepository():IPaymentRepository;
    abstract public function MakeSubjectRepository():ISubjectRepository;
    abstract public function MakeUserRepository():IUserRepository;
}