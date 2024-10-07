<?php
require_once './BusinessLayer/Models/ValidationResult.php';
function isRegisterValid($register):ValidationResult{
    $result = new ValidationResult(false,"The register data is not valid");



    return $result;
}
function isLoginValid($username, $password):ValidationResult{
    $result = new ValidationResult(false,"The login data was not valid");



    return $result;
}