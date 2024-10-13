<?php

class ValidationResult{
    public $isValid;
    public $message;
    function __construct($theIsValid, $theMessage){
        $this->isValid = $theIsValid;
        $this->message = $theMessage;
    }    
}