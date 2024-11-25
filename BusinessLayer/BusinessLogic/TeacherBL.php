<?php
require_once './BusinessLayer/Models/ValidationResult.php';
require_once './BusinessLayer/Models/SetTeacherSchedule.php';
require_once './DataAccessLayer/Factories/AbstractRepositoriesFactory.php';
require_once './DataAccessLayer/Interfaces/ITeacherRepository.php';
class TeacherBL{
    private static $_instance;
    private $_teacherRepository;
    private function __construct() {
        $repositoryFactory = AbstractRepositoriesFactory::GetFactory('mysql')::GetInstance();
        $this->_teacherRepository = $repositoryFactory->MakeTeacherRepository();
    }
    public static function GetInstance(){
        if(self::$_instance == null)
            self::$_instance = new TeacherBL();

        return self::$_instance;
    }
    private function setFalseValidationResult(ValidationResult $theValidationResult, string $theMessage){
        $theValidationResult->isValid = false;
        $theValidationResult->message = $theMessage;
    }
    private function isTeacherScheduleSet($theUserId, $theDayOfWeek):bool{
        return $this->_teacherRepository->IsTeacherScheduleSet($theUserId, $theDayOfWeek);
    }
    private function isDayOfWeekValid($theDayOfWeek, ValidationResult $theValidationResult):bool{
        $isValid = $theDayOfWeek == "mon" || $theDayOfWeek == "tue" || $theDayOfWeek == "wed" || 
                    $theDayOfWeek == "thu" || $theDayOfWeek == "fri" || $theDayOfWeek == "sat" || 
                    $theDayOfWeek == "sun";
        return $isValid;
    }
    private function isTimeValid($theTime, ValidationResult $theValidationResult):bool{
        $format = 'H:i';
        $aDateTime = DateTime::createFromFormat($format, $theTime);
        if($aDateTime->format($format) == $theTime)
            $theValidationResult->isValid = true;
        else
            $this->setFalseValidationResult($theValidationResult, "The time is not a valid one");

        return $theValidationResult->isValid;
    }
    private function isStartTimeBeforeEndTime($startTime, $endTime, ValidationResult $theValidationResult):bool{
        if($startTime > $endTime)
            $this->setFalseValidationResult($theValidationResult, "La hora de comienzo no puede ser después de la hora de finalización");
        else
            $theValidationResult->isValid = true;

        return $theValidationResult->isValid;
    }
    private function areTimesValid($theStartTime, $theEndTime, ValidationResult $theValidationResult):ValidationResult{
        $validationResult = new ValidationResult(false, "");

        $startTime = DateTime::createFromFormat('H:i',$theStartTime);
        $endTime = DateTime::createFromFormat('H:i',$theEndTime);

        if(!($this->isStartTimeBeforeEndTime($theStartTime, $theEndTime, $theValidationResult)))
            return $validationResult;
        
        if(!($this->isTimeValid($startTime, $validationResult)))
            return $validationResult;

        if(!($this->isTimeValid($endTime, $validationResult)))
            return $validationResult;

        return $validationResult;

    }
    private function validateSetTeacherSchedule(SetTeacherSchedule $theSetTeacherSchedule):ValidationResult{
        $validationResult = new ValidationResult(true, "");
        foreach($theSetTeacherSchedule->daysWorkingTime as $dayWorkingTime){
            if(!($this->isDayOfWeekValid($dayWorkingTime->dayOfWeek, $validationResult)))
                return $validationResult;
            if(!($this->areTimesValid($dayWorkingTime->startTime, $dayWorkingTime->endTime, $validationResult)))
                return $validationResult;
        }
        return $validationResult;
    }
    private function setTeacherScheduleDayByDay(SetTeacherSchedule $theSetTeacherSchedule){
        foreach($theSetTeacherSchedule->daysWorkingTime as $dayWorkingTime){
            if($this->isTeacherScheduleSet($theSetTeacherSchedule->userId, $dayWorkingTime->dayOfWeek))
                $this->_teacherRepository->SetTeacherSchedule($theSetTeacherSchedule->userId,$dayWorkingTime->dayOfWeek,$dayWorkingTime->startTime,$dayWorkingTime->endTime);
            else
                $this->_teacherRepository->UpdateTeacherSchedule($theSetTeacherSchedule->userId,$dayWorkingTime->dayOfWeek,$dayWorkingTime->startTime,$dayWorkingTime->endTime);
        }
    }
    public function SetTeacherSchedule(SetTeacherSchedule $theSetTeacherSchedule):ValidationResult{
        $validationResult = $this->validateSetTeacherSchedule($theSetTeacherSchedule);
        if(!($validationResult->isValid))
            return $validationResult;
        
        $this->setTeacherScheduleDayByDay($theSetTeacherSchedule);

        return $validationResult;
    }

    public function IsUserATeacher($userId):bool{
        $user = $this->_teacherRepository->GetTeacherById($userId);
        return count($user) > 0;
    }

}