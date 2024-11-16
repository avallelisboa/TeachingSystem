<?php

class ConnectionFactory{
    private static $instance;
    private $servername;
    private $dbname;
    private $username;
    private $password;
    private function __construct(){
        $this->servername=$_ENV["DATABASE_ADDRESS"];
        $this->dbname=$_ENV["DB_NAME"];
        $this->username=$_ENV["USERNAME"];
        $this->password=$_ENV["PASSWORD"];
    }
    public static function GetInstance():ConnectionFactory{
        if(is_null(self::$instance))
            self::$instance = new ConnectionFactory();

        return self::$instance;
    }
    public function closeConnection($theConnection){
        $theConnection->close();
    }
    public function newConnection(){
        return new mysqli($this->servername, $this->username, 
                    $this->password, $this->dbname);
    }
}