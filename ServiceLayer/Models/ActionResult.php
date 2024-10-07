<?php

class ActionResult{
    function __construct($TheIsValid, $TheMessage){
        $isValid = $TheIsValid;
        $message = $TheMessage;
    }
    public $isValid;
    public $message;
    public function GetIsValid(){
        return $this->isValid;
    }
    public function GetMessage(){
        return $this->message;
    }
}