<?php

interface ILessonRepository{
    public function AddLesson($lesson);
    public function DeleteLesson($lesson);
    public function UpdateLesson($lesson);
    public function GetLessonById($id);
    public function GetLessonsByTeacherIdBetweenDates($teacherId, $startDate, $endDate);
    public function GetConflictingLessonsCount($teacherId, $startDate, $endDate);
}