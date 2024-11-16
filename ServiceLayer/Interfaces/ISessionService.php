<?php
require_once './ServiceLayer/Models/ActionResult.php';
require_once './ServiceLayer/Models/Register.php';
interface ISessionService{
    public function login($username, $password):ActionResult;
    public function isLogged($token):bool;
    public function logout();
}