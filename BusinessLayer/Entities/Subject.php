<?php
class Subject {
    private int $id;
    private string $name;
    private array $teachers;
    public function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;
        $this->teachers = [];
    }

    public function addTeacher(User $teacher): void {
        $this->teachers[] = $teacher;
    }

    public function getTeachers(): array {
        return $this->teachers;
    }

    public function getName(): string {
        return $this->name;
    }
}