<?php

interface ILiveSession{
    public function startSession($sessionId);
    public function stopSession($sessionId);
    public function createSession($teacherId);
    public function removeSession($teacherId);
}