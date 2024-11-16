<?php
require_once './DataAccessLayer/Interfaces/IUserRepository.php';
require_once './DataAccessLayer/MySQLImplementation/ConnectionFactory.php';
require_once './DataAccessLayer/MySQLImplementation/MySqlTools.php';
require_once './DataAccessLayer/MySQLImplementation/CreateTables.php';

class UserRepository implements IUserRepository{
 
    function AddUser($user){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $sql = "INSERT INTO Users(
            username,password,firstname,lastname,email,isStudent,isTeacher
        ) VALUES(?,?,?,?,?,?,?)";
        $params = array(
            "sssssii",
            array(
                $user->username,
                $user->password,
                $user->firstName,
                $user->lastName,
                $user->email,
                $user->isStudent,
                $user->isTeacher,
            )
        );
        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    function EmailExists($email):bool{
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT email
                FROM Users
                WHERE email = ?";
        $result = MySqlTools::RunQueryAndGetResult($conn,$sql,array("s", array($email)));

        $exists = $result->num_rows > 0;
        
        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $exists;
    }
    function GetUserByEmail($email){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT email
                FROM Users
                WHERE email = ?";
        $result = MySqlTools::RunQueryAndGetResult($conn,$sql,array("s", array($email)));
        $user = $result->fetch_assoc()[0];

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $user;
    }
    function GetUserByUserName($username){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT *
                FROM Users
                WHERE username = ?";
        
        $result = MySqlTools::RunQueryAndGetResult($conn,$sql,array("s",array($username)));
        $user = $result->fetch_assoc();

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $user;
    }
    function RemoveUserById($id){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $sql = "DELETE
                FROM Users
                WHERE ID = ?";
        $result = MySqlTools::RunQueryAndGetResult($conn, $sql,array("i", array($id)));

        $wasRemoved = $result->affected_rows > 0;

        ConnectionFactory::GetInstance()->closeConnection($conn);
        
        return $wasRemoved;
    }
    function UpdateUser($user){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "UPDATE Users
                SET password = ?, firstname = ?, 
                lastname = ?, email = ?, 
                isStudent = ?,isTeacher = ?
                WHERE id = ?";
        
        $params = array(
            "ssssbbi",
            array(
                $user->password,
                $user->firstName,
                $user->lastName,
                $user->email,
                $user->isStudent,
                $user->isTeacher,
                $user->getId()
            )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $wasUpdated = $result->num_rows > 0;

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $wasUpdated;
    }
    function UserNameExists($username):bool{
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT username
                FROM Users
                WHERE username = ?";

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql,array("s",array($username)));
        $exists = $result->num_rows > 0;

        ConnectionFactory::GetInstance()->closeConnection($conn);
        
        return $exists;
    }
}