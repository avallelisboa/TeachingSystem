<?php

interface ILessonRepository{
    public function AddLesson($lesson);
    public function DeleteLesson($lesson);
    public function UpdateLesson($lesson);
    public function GetLessonById($id);
    public function GetLessonsByTeacherIdBetweenDates($teacheId, $startDate, $endDate);
}