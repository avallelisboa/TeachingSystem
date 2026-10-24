<?php
require_once './DataAccessLayer/DTOs/Teacher/AddTeacher.php';
require_once './DataAccessLayer/DTOs/Teacher/UpdateTeacher.php';
interface ITeacherRepository{
    public function AddTeacher(AddTeacher $theAddTeacherDTO);
    public function UpdateTeacher(UpdateTeacher $theUpdateTeacher);

    public function GetTeacherById($userId);
    public function GetTeachersBySubjectId($subjectId, $numberOfResults, $pageNumber);
    public function GetTeachersBySearchWords($searchWords, $numberOfResults, $pageNumber);
    public function IsTeacherScheduleSet($userId, $dayOfWeek);
    public function SetTeacherSchedule($userId, $dayOfWeek, $startTime, $endTime);
    public function UpdateTeacherSchedule($userId, $dayOfWeek,$startTime, $endTime);
}