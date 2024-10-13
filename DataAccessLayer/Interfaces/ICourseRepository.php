<?php

interface ICourseRepository{
    public function AddCourse($course);
    public function RemoveCourseById($id);
    public function GetCourseById($id);
    public function UpdateCourse($course);
}