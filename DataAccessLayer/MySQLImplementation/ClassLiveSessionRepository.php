<?php
require_once './DataAccessLayer/Interfaces/IClassLiveSessionRepository.php';

class ClassLiveSessionRepository implements IClassLiveSessionRepository{
    function AddSession($session){}
    function GetSessionById($sessionId){}
    function GetSessionByTeacherIdBetweenDates($teacherId, $startDate, $endDate){}
    function RemoveSessionById($sessionId){}
    function UpdateSession($session){}
}