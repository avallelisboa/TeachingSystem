<?php
require_once './ServiceLayer/Models/ActionResult.php';
require_once './ServiceLayer/Models/Register.php';
interface IRegisterService{
    public function register(Register $registerModel):ActionResult;
}