<?php
class ClassSession {
    private int $id;
    private Lesson $lesson;
    private string $connectionInfo; // WebRTC connection information (SDP, ICE candidates, etc.)

    public function __construct(int $id, Lesson $lesson, string $connectionInfo) {
        $this->id = $id;
        $this->lesson = $lesson;
        $this->connectionInfo = $connectionInfo;
    }

    public function getConnectionInfo(): string {
        return $this->connectionInfo;
    }

    public function getLesson(): Lesson {
        return $this->lesson;
    }
}