<?php
require_once './DataAccessLayer/Factories/AbstractRepositoriesFactory.php';
require_once './DataAccessLayer/Interfaces/ILessonRepository.php';
class LessonBL{
    private static $_instance;
    private $_lessonRepository;
    private function __construct(){
        $repositoryFactory = AbstractRepositoriesFactory::GetFactory('mysql')::GetInstance();
        $this->_lessonRepository = $repositoryFactory->MakeLessonRepository();
    }
    public static function GetInstance(){
        if(self::$_instance == null)
            self::$_instance = new LessonBL();

        return self::$_instance;
    }
}