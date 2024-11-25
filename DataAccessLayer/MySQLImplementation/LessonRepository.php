<?php
require_once './DataAccessLayer/Interfaces/ILessonRepository.php';
require_once './DataAccessLayer/MySQLImplementation/ConnectionFactory.php';
require_once './DataAccessLayer/MySQLImplementation/MySqlTools.php';

class LessonRepository implements ILessonRepository{
    function AddLesson($lesson){}
    function UpdateLesson($lesson){}
    function DeleteLesson($lesson){}
    function GetLessonById($id){}
    public function GetLessonsByTeacherIdBetweenDates($teacherId, $startDate, $endDate){

    }
    public function GetConflictingLessonsCount($teacherId, $startDate, $endDate){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $sql = "SELECT COUNT(*) AS conflictsNumber
                FROM Lessons WHERE teacherId = ?
                AND startTime < ? AND endTime > ?";
        $params = array(
            "iss", array(
                $teacherId,
                $endDate,
                $startDate
            )
        );
        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $count = $result->fetch_assoc()['conflictsNumber'];

        ConnectionFactory::GetInstance()->closeConnection($conn);
        
        return $count;
    }
}