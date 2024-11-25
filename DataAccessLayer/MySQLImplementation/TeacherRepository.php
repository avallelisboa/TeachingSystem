<?php
require_once './DataAccessLayer/Interfaces/ITeacherRepository.php';


class TeacherRepository implements ITeacherRepository{
    public function AddTeacher(AddTeacher $theAddTeacherDTO){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "INSERT INTO TeacherProfiles(
                            userId, hourlyRate, currencyId, description
                            ) VALUES(?,?,?,?)";
        $params = array(
            "ifis", array(
                    $theAddTeacherDTO->userId,
                    $theAddTeacherDTO->hourlyRate,
                    $theAddTeacherDTO->currencyId,
                    $theAddTeacherDTO->description
            )
        );

        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    public function UpdateTeacher(UpdateTeacher $theUpdateTeacher){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $sql = "UPDATE TeacherProfiles(
            hourlyRate, currencyId, description
        ) SET hourlyRate = ?, currencyId = ?, description = ?
        WHERE userId = ?";
        $params = array(
            "iis", array(
                    $theUpdateTeacher->hourlyRate,
                    $theUpdateTeacher->currencyId,
                    $theUpdateTeacher->description,
                    $theUpdateTeacher->userId
                )
        );

        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    public function GetTeacherById($userId){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $sql = "SELECT * FROM TeacherProfiles WHERE userId = ?";
        $params = array(
            'i', array(
                $userId
            )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $teacher = $result->fetch_assoc();

        ConnectionFactory::GetInstance()->closeConnection($conn);
        
        return $teacher;
    }
    public function GetTeachersBySubjectId($subjectId, $numberOfResults, $pageNumber){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT tp.userId, tp.hourlyRate,c.charCode,tp.description
                FROM TeacherProfiles tp JOIN Teaches ts ON tp.userId = ts.userId
                JOIN Subjects s ON ts.subjectId = s.id
                LIMIT ? OFFSET ?";
        $params = array(
            "iii",array(
                $subjectId,
                $numberOfResults,
                $numberOfResults * $pageNumber
            )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $teachers = $result->fetch_assoc();

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $teachers;
    }
    public function GetTeachersBySearchWords($searchWords, $numberOfResults, $pageNumber){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT tp.userId, tp.hourlyRate,c.charCode,tp.description, u.firstname, u.lastname, u.email, u.country
                FROM TeacherProfiles tp JOIN Teaches ts ON tp.userId = ts.userId
                JOIN Subjects s ON ts.subjectId = s.id
                JOIN Users u ON tp.userId = u.id
                WHERE s.subjectName LIKE ? OR tp.description LIKE ?
                LIMIT ? OFFSET ?";
        $params = array(
            "ssii",array(
                $searchWords,
                $searchWords,
                $numberOfResults,
                $numberOfResults * $pageNumber,
            )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $teachers = $result->fetch_assoc();

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $teachers;
    }

    public function IsTeacherScheduleSet($userId, $dayOfWeek){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT dayOfWeek FROM TeacherSchedules WHERE teacherId = ? AND dayOfWeek = ?";
        $params = array(
            "is", array(
                    $userId,
                    $dayOfWeek
                )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql,$params);
        $isSet = $result->num_rows > 0;
        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $isSet;
    }
    public function SetTeacherSchedule($userId, $dayOfWeek, $startTime, $endTime){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "INSERT INT TeacherSchedules(teacherId,dayOfWeek,startTime,endTime)
                VALUES(?,?,?,?)";
        $params = array(
            "isss", array(
                    $userId,
                    $dayOfWeek,
                    $startTime,
                    $endTime
                )
        );
        MySqlTools::RunQuery($conn,$sql,$params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    public function UpdateTeacherSchedule($userId, $dayOfWeek,$startTime, $endTime){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "UPDATE TeacherSchedules(startTime,endTime)
                SET startTime = ?, endTime = ?
                WHERE userId = ? AND dayOfWeek = ?";
        $params = array(
            "ssis",array(
                    $startTime,
                    $endTime,
                    $userId,
                    $endTime,
                    $dayOfWeek
                )
        );
        MySqlTools::RunQuery($conn,$sql,$params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
}