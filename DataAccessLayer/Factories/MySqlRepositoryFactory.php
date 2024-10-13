<?php
require_once './DataAcccessLayer/Factories/AbstractRepositoriesFactory.php';
require_once './DataAccessLayer/MySQLImplementation/ClassLiveSessionRepository.php';
require_once './DataAccessLayer/MySQLImplementation/CourseRepository.php';
require_once './DataAccessLayer/MySQLImplementation/LessonRepository.php';
require_once './DataAccessLayer/MySQLImplementation/PaymentRepository.php';
require_once './DataAccessLayer/MySQLImplementation/SubjectRepository.php';
require_once './DataAccessLayer/MySQLImplementation/UserRepository.php';

class MySqlRepositoryFactory extends AbstractRepositoriesFactory{
    private static $_instance;
    private static $_classLiveSessionRepository;
    private static $_courseRepository;
    private static $_lessonRepository;
    private static $_paymentRepository;
    private static $_subjectRepository;
    private static $_userRepository;
    private function __construct(){}
    public static function GetInstance(){
        if(self::$_instance == null)
            self::$_instance = new MySqlRepositoryFactory();

        return self::$_instance;
    }
    public function MakeClassLiveSessionRepository():IClassLiveSessionRepository{
        if(self::$_classLiveSessionRepository == null)
            self::$_classLiveSessionRepository = new ClassLiveSessionRepository();

        return self::$_classLiveSessionRepository;
    }
    public function MakeCourseRepository():ICourseRepository{
        if(self::$_courseRepository == null)
            self::$_courseRepository = new CourseRepository();

        return self::$_courseRepository;
    }
    public function MakeLessonRepository():ILessonRepository{
        if(self::$_lessonRepository == null)
            self::$_lessonRepository = new LessonRepository();

        return self::$_lessonRepository;
    }
    public function MakePaymentRepository():IPaymentRepository{
        if(self::$_paymentRepository == null)
            self::$_paymentRepository = new PaymentRepository();

        return self::$_paymentRepository;
    }
    public function MakeSubjectRepository():ISubjectRepository{
        if(self::$_subjectRepository == null)
            self::$_subjectRepository = new SubjectRepository();

        return self::$_subjectRepository;
    }
    public function MakeUserRepository():IUserRepository{
        if(self::$_userRepository == null)
            self::$_userRepository = new UserRepository();

        return self::$_userRepository;
    }
}