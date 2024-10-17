<?php

interface ILessonService{
    public function createLesson($date, $teacherId, $maxStudents, $hourlyPrice, $duration);
    public function addStudent($lessonId, $studentId);
    public function deleteStudent($lessonId, $studentId);
    public function cancelLesson($lessonId, $studentId);
}