<?php
require_once './DataAccessLayer/Interfaces/IUserRepository.php';
require_once './DataAccessLayer/MySQLImplementation/CreateTables.php';

class UserRepository implements IUserRepository{
    private $servername;
    private $dbname;
    private $username;
    private $password;
    public function __construct(){
        $this->servername="192.168.1.169";
        $this->dbname="teachingsystemdb";
        $this->username="root";
        $this->password="";
    }

    function AddUser($user){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "INSERT INTO Users(
                    username,password,firstname,lastname,email,isStudent,isTeacher
                ) VALUES(
                    ".$user->username.",".$user->password.",
                    ".$user->firstname.",".$user->lastname.",
                    ".$user->email.",".$user->isStuden.",".$user->isTeacher."
                )";
        $conn->query($sql);
        $conn->close();
    }
    function EmailExists($email):bool{
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT email
                FROM Users
                WHERE email = ".$email;
        $result = $conn->query($sql);

        $exists = $result->num_rows > 0;
        $conn->close();

        return $exists;
    }
    function GetUserByEmail($email){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT email
                FROM Users
                WHERE email = ".$email;
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }
    function GetUserByUserName($username){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT username
                FROM Users
                WHERE username = ".$username;
        $result = $conn->query($sql);

        return $result->fetch_assoc();
    }
    function RemoveUserById($id){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "DELETE
                FROM Users
                WHERE ID = ".$id;
        $result = $conn->query($sql);

        $conn->close();
        
        return $result;
    }
    function UpdateUser($user){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "UPDATE Users
                SET password = ".$user->password.", firstname = ".$user->firstName.", 
                lastname = ".$user->lastName.", email = ".$user->email.", 
                isStudent = ".$user->isStudent.",isTeacher = ".$user->isTeacher."
                WHERE id = ".$user->getId();
        $result = $conn->query($sql);

        return $result->num_rows > 0;
    }
    function UserNameExists($username):bool{
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT username
                FROM Users
                WHERE username = ".$username;
        $result = $conn->query($sql);

        $exists = $result->num_rows > 0;
        $conn->close();
        
        return $exists;
    }
}