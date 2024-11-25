<?php
class Register{
    public $userName;
    public $firstName;
    public $lastName;
    public $email;
    public $country;
    public $password;
    function __construct($theUserName,$theFirstName,$theLastName,$theEmail,$theCountry,$thePassword){
        $this->userName = $theUserName;
        $this->firstName = $theFirstName;
        $this->lastName = $theLastName;
        $this->email = $theEmail;
        $this->country = $theCountry;
        $this->password = $thePassword;
    }
}