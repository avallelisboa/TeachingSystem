<?php
interface IPaymentService {
    public function charge($amount, $currency, $customerData);
    public function refund($transactionId);
    public function checkTransactionStatus($transactionId);
}