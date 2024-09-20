<?php
class Lesson {
    private int $id;
    private User $teacher;
    private array $students;  // Array of User objects
    private DateTime $startTime;
    private DateTime $endTime;
    private float $hourlyRate;
    private int $maxStudents;

    public function __construct(int $id, User $teacher, DateTime $startTime, DateTime $endTime, float $hourlyRate, int $maxStudents) {
        $this->id = $id;
        $this->teacher = $teacher;
        $this->students = [];
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->hourlyRate = $hourlyRate;
        $this->maxStudents = $maxStudents;
    }

    public function addStudent(User $student): bool {
        if (count($this->students) < $this->maxStudents) {
            $this->students[] = $student;
            return true;
        }
        return false;
    }

    public function getTeacher(): User {
        return $this->teacher;
    }

    public function getStudents(): array {
        return $this->students;
    }

    public function getStartTime(): DateTime {
        return $this->startTime;
    }

    public function getEndTime(): DateTime {
        return $this->endTime;
    }

    public function getHourlyRate(): float {
        return $this->hourlyRate;
    }

    public function getMaxStudents(): int {
        return $this->maxStudents;
    }
}