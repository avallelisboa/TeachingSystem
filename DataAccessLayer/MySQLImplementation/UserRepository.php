<?php
require_once './DataAccessLayer/Interfaces/IUserRepository.php';

class UserRepository implements IUserRepository{
    function AddUser($user){}
    function EmailExists($email):bool{}
    function GetUserByEmail($email){}
    function GetUserByUserName($username){}
    function RemoveUserById($id){}
    function UpdateUser($user){}
    function UserNameExists($email):bool{}
}