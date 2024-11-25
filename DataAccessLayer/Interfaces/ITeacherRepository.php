<?php
require_once './DataAccessLayer/DTOs/AddTeacher.php';
require_once './DataAccessLayer/DTOs/UpdateTeacher.php';
interface ITeacherRepository{
    public function AddTeacher(AddTeacher $theAddTeacherDTO);
    public function UpdateTeacher(UpdateTeacher $theUpdateTeacher);
    public function GetTeachersBySubjectId($subjectId, $numberOfResults, $pageNumber);
    public function GetTeachersBySearchWords($searchWords, $numberOfResults, $pageNumber);
    public function IsTeacherScheduleSet($userId, $dayOfWeek);
    public function SetTeacherSchedule($userId, $dayOfWeek, $startTime, $endTime);
    public function UpdateTeacherSchedule($userId, $dayOfWeek,$startTime, $endTime);
}