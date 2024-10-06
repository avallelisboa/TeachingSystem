<?php
class User{
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private array $roles;

    public function __construct(int $id, string $firstName, string $lastName, string $email, array $roles) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->roles = $roles;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getFullName(): string {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getRoles(): array {
        return $this->roles;
    }

    public function isTeacher(): bool {
        return in_array('teacher', $this->roles);
    }

    public function isStudent(): bool {
        return in_array('student', $this->roles);
    }
}