<?php
require_once('../../Interfaces/IPaymentService.php');

class MockPaymentService implements IPaymentService{
    public function charge($amount, $currency, $customerData){
        
    }
    public function refund($transactionId){

    }
    public function checkTransactionStatus($transactionId){

    }
}