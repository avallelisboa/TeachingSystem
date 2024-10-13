<?php
require_once './DataAccessLayer/Interfaces/IPaymentRepository.php';

class PaymentRepository implements IPaymentRepository{
    function AddPayment($payment){}
    function GetPaymentById($id){}
    function GetReceivedPaymentByUserIdBetweenDates($userId, $startDate, $endDate){}
    function RefundPayment($payment){}
}