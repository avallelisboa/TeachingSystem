<?php

class MockPaymentService extends IPaymentService{
    public function charge($amount, $currency, $customerData){
        
    }
    public function refund($transactionId){

    }
    public function checkTransactionStatus($transactionId){

    }
}