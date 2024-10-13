<?php

interface IPaymentRepository {
    public function AddPayment($payment);
    public function RefundPayment($payment);
    public function GetPaymentById($id);
    public function GetReceivedPaymentByUserIdBetweenDates($userId, $startDate, $endDate);
}