<?php

$servername=$_ENV["DATABASE_ADDRESS"];
$dbname=$_ENV["DB_NAME"];
$username=$_ENV["USERNAME"];
$password=$_ENV["PASSWORD"];

$con = new mysqli($servername, $username, $password, $dbname);
//echo "Connected successfully";

$sql = "CREATE TABLE IF NOT EXISTS Users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(100) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    country VARCHAR(30) NOT NULL DEFAULT 'Uruguay',
    isStudent BIT(1) NOT NULL DEFAULT 1,
    isTeacher BIT(1) NOT NULL DEFAULT 0
)";
$con->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS Ratings (
    ratedTeacherId INT(6) UNSIGNED NOT NULL,
    raterStudentId INT(6) UNSIGNED NOT NULL,
    rate TINYINT(1) UNSIGNED NOT NULL CHECK (rate IN (1, 2, 3, 4, 5)),
    comment VARCHAR(200),
    rateDate DATETIME,
    PRIMARY KEY (ratedTeacherId, raterStudentId, rateDate),
    FOREIGN KEY (ratedTeacherId) REFERENCES Users(id),
    FOREIGN KEY (raterStudentId) REFERENCES Users(id)
) ENGINE=InnoDB";
$con->query($sql);
$sql = "CREATE TABLE IF NOT EXISTS Languages (
    languageId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    languageName VARCHAR(30) NOT NULL DEFAULT 'Uruguay'
)";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS Speaks (
    userId INT(6) UNSIGNED NOT NULL,
    languageId INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY (userId, languageId),
    FOREIGN KEY (userId) REFERENCES Users(id),
    FOREIGN KEY (languageId) REFERENCES Languages(languageId)
) ENGINE=InnoDB";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS Subjects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    subjectName VARCHAR(30) NOT NULL
)";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS Teaches (
    userId INT(6) UNSIGNED NOT NULL,
    subjectId INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY (userId, subjectId),
    FOREIGN KEY (userId) REFERENCES Users(id),
    FOREIGN KEY (subjectId) REFERENCES Subjects(id)
) ENGINE=InnoDB";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS PaymentMethods (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    methodName VARCHAR(50) NOT NULL
)";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS UserPaymentMethods (
    userId INT UNSIGNED NOT NULL,
    paymentMethodId INT UNSIGNED NOT NULL,
    paymentToken VARCHAR(100),
    PRIMARY KEY (userId, paymentMethodId),
    FOREIGN KEY (userId) REFERENCES Users(id),
    FOREIGN KEY (paymentMethodId) REFERENCES PaymentMethods(id)
) ENGINE=InnoDB";
$con->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS Payments (
    payerId INT(6) UNSIGNED NOT NULL,
    collectorId INT(6) UNSIGNED NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    currency CHAR(3) NOT NULL,
    method VARCHAR(30),
    paymentDate DATETIME NOT NULL,
    wasRefunded BIT(1) DEFAULT 0,
    PRIMARY KEY (payerId, collectorId, paymentDate),
    FOREIGN KEY (payerId) REFERENCES Users(id),
    FOREIGN KEY (collectorId) REFERENCES Users(id)
) ENGINE=InnoDB";
$con->query($sql);

//echo "Tables were created";
$con->close();