<?php
require_once './DataAccessLayer/Interfaces/ICurrencyRepository.php';

class CurrencyRepository implements ICurrencyRepository{
    public function AddCurrency($charCode){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "INSERT INTO Currencies(charCode) VALUES(?)";
        $params = array(
            "s", array(
                    $charCode
                )
        );

        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    public function GetCurrencyById($id){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql="";
        $params = array(
            "i", array(
                    $id
                )
        );

        $result = MySqlTools::RunQueryAndGetResult($conn, $sql, $params);
        $currency = $result->fetch_obj();

        ConnectionFactory::GetInstance()->closeConnection($conn);

        return $currency;

    }
    public function GetCurencies(){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql = "SELECT * FROM Currencies";
        $result = MySqlTools::RunQueryWithoutParamsAndGetResult($conn,$sql);
        $currencies = $result->fetch_assoc();
        
        ConnectionFactory::GetInstance()->closeConnection($conn);
        
        return $currencies;
    }
    public function RemoveCurrency($id){

    }
    public function UpdateCurrency($id, $charCode){

    }
}