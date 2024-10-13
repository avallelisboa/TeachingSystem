<?php
class Register{
    public $userName;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    function __construct($theUserName,$theFirstName,$theLastName,$theEmail,$thePassword){
        $this->userName = $theUserName;
        $this->firstName = $theFirstName;
        $this->lastName = $theLastName;
        $this->email = $theEmail;
        $this->password = $thePassword;
    }
}