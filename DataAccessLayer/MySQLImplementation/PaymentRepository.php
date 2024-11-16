<?php
require_once './DataAccessLayer/Interfaces/IPaymentRepository.php';
require_once './DataAccessLayer/MySQLImplementation/ConnectionFactory.php';
require_once './DataAccessLayer/MySQLImplementation/MySqlTools.php';

class PaymentRepository implements IPaymentRepository{
    function AddPayment($payment){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $query = "INSERT INTO PAYMENTS(
            payerId, collectorId, ammount, currency, method, paymentDate
        ) VALUES(?,?,?,?,?,?)";
        $params= array(
            "iifsss",
            array(
                $payment->payer->getId(),
                $payment->collector->getId(),
                $payment->amount,
                $payment->currency,
                $payment->method,
                $payment->paymentDate
            )
        );

        MySqlTools::RunQuery($conn, $query, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    function GetPaymentById($id){

    }
    function GetReceivedPaymentByUserIdBetweenDates($userId, $startDate, $endDate){

    }
    function RefundPayment($payment){

    }
}