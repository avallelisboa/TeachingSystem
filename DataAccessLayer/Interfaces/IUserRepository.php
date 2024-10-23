<?php

interface IUserRepository{
    public function AddUser($user);
    public function RemoveUserById($id);
    public function EmailExists($email):bool;
    public function UserNameExists($username):bool;
    public function GetUserByEmail($email);
    public function GetUserByUserName($username);
    public function UpdateUser($user);
}