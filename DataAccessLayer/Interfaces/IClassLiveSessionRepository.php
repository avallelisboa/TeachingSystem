<?php

interface IClassLiveSessionRepository{
    public function AddSession($session);
    public function RemoveSessionById($sessionId);
    public function UpdateSession($session);
    public function GetSessionById($sessionId);
    public function GetSessionByTeacherIdBetweenDates($teacherId, $startDate, $endDate);
}