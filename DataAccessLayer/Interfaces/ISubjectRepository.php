<?php

interface ISubjectRepository{
    public function AddSubject($subject);
    public function RemoveSubjectById($id);
    public function UpdateSubject($subject);
    public function GetSubjectById($id);
}