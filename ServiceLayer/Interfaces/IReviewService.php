<?php

interface IReviewService{
    public function makeReview($studentId,$lessonId,$review,$qualitification);
    public function updateReview($reviewId, $review, $qualification);
}