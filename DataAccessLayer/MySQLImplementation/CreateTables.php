<?php

$servername="192.168.1.81:3306";
$dbname="teachingsystemdb";
$username="root";
$password="";

$conn = new mysqli($servername, $username, $password, $dbname);
//echo "Connected successfully";

$sql = "CREATE TABLE IF NOT EXISTS Users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    isStudent BIT(1),
    isTeacher BIT(1)
)";
$conn->query($sql);

//echo "Tables were created";
$conn->close();