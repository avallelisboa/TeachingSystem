<?php
require_once './DataAccessLayer/Interfaces/ILessonRepository.php';

class LessonRepository implements ILessonRepository{
    function AddLesson($lesson){}
    function DeleteLesson($lesson){}
    function GetLessonById($id){}
    function GetLessonsByTeacherIdBetweenDates($teacheId, $startDate, $endDate){}
    function UpdateLesson($lesson){}
}