<?php
require_once('./ServiceLayer/Models/ActionResult.php');
interface ISessionService{
    public function login($username, $password):ActionResult;
    public function isLogged():bool;
    public function logout();
}