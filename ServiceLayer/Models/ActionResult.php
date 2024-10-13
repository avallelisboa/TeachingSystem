<?php

class ActionResult{
    public $isValid;
    public $message; 
    function __construct($isValid, $message){
        $this->isValid = $isValid;
        $this->message = $message;
    }   
}