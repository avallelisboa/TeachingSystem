<?php
require_once './DataAccessLayer/Interfaces/IPaymentRepository.php';
require_once './DataAccessLayer/MySQLImplementation/ConnectionFactory.php';
require_once './DataAccessLayer/MySQLImplementation/MySqlTools.php';

class PaymentRepository implements IPaymentRepository{
    function AddPayment($payment){
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $query = "INSERT INTO Payments(
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
        $conn = ConnectionFactory::GetInstance()->newConnection();
        $query = "SELECT * FROM PAYMENTS WHERE payerId = ?";
        $result = MySqlTools::RunQueryAndGetResult($conn,$query, array("i", array($id)));
        $payment = $result->fetch_assoc()[0];
        ConnectionFactory::GetInstance()->closeConnection($conn);
        return $payment;
    }
    function GetReceivedPaymentByUserIdBetweenDates($userId, $startDate, $endDate){

    }
    function RefundPayment($payment){

    }
}