<?php

class ValidationResult{
    function __construct($TheIsValid, $TheMessage){
        $isValid = $TheIsValid;
        $message = $TheMessage;
    }
    public $isValid;
    public $message;
}