<?php
class Register{
    function __construct($theUserName,$theFirstName,$theLastName,$theEmail,$thePassword){
        $userName = $theUserName;
        $firstName = $theFirstName;
        $lastName = $theLastName;
        $email = $theEmail;
        $password = $thePassword;
    }
    public $username;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    function GetUsername(){
        return $this->username;
    }
    function GetFirstName(){
        return $this->firstName;
    }
    function GetLastName(){
        return $this->lastName;
    }
    function GetEmail(){
        return $this->email;
    }
    function GetPassword(){
        return $this->password;
    }
}