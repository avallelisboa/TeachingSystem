<?php
require_once './ServiceLayer/Models/ActionResult.php';
require_once './ServiceLayer/Models/Register.php';
interface ISessionService{
    public function register($registerModel):ActionResult;
    public function login($username, $password):ActionResult;
    public function isLogged():bool;
    public function logout();
}