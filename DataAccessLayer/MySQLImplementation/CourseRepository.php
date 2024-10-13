<?php
require_once './DataAccessLayer/Interfaces/ICourseRepository.php';

class CourseRepository implements ICourseRepository{
    function AddCourse($course){}
    function GetCourseById($id){}
    function RemoveCourseById($id){}
    function UpdateCourse($course){}
}