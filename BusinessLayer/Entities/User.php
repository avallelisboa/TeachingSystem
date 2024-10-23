<?php
class User{
    private int $id;
    public string $username;
    public string $password;
    public string $firstName;
    public string $lastName;
    public string $email;
    public bool $isStudent;
    public bool $isTeacher;

    
    public function __construct(int $id, string $userName, string $password, string $firstName, string $lastName, string $email, bool $isStudent, bool $isTeacher) {
        $this->id = $id;
        $this->username = $userName;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->isStudent = $isStudent;
        $this->isTeacher = $isTeacher;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsername():string{
        return $this->username;
    }
    public function getPassword():string{
        return $this->password;
    }
    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function isTeacher(): bool {
        return $this->isTeacher;
    }

    public function isStudent(): bool {
        return $this->isStudent;
    }
}