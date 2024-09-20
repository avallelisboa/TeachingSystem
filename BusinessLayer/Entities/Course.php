<?php
class Course {
    private int $id;
    private User $teacher;
    private string $title;
    private string $description;
    private DateTime $startDate;
    private DateTime $endDate;
    private array $enrolledStudents; // Array of User objects

    public function __construct(int $id, User $teacher, string $title, string $description, DateTime $startDate, DateTime $endDate) {
        $this->id = $id;
        $this->teacher = $teacher;
        $this->title = $title;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->enrolledStudents = [];
    }

    public function enrollStudent(User $student): void {
        $this->enrolledStudents[] = $student;
    }

    public function isAccessible(DateTime $currentDate): bool {
        return $currentDate >= $this->startDate && $currentDate <= $this->endDate;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getTeacher(): User {
        return $this->teacher;
    }

    public function getEnrolledStudents(): array {
        return $this->enrolledStudents;
    }
}