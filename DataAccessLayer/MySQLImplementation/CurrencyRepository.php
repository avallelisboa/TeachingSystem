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
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql= "DELETE FROM Currencies WHERE id = ?";
        $params = array(
            "i",array(
                $id
            )
        );

        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
    public function UpdateCurrency($id, $charCode){
        $conn = ConnectionFactory::GetInstance()->newConnection();

        $sql= "UPDATE Currencies(charCode) SET charCode = ? WHERE id = ?";
        $params = array(
            "si",array(
                $charCode,
                $id
            )
        );

        MySqlTools::RunQuery($conn, $sql, $params);
        ConnectionFactory::GetInstance()->closeConnection($conn);
    }
}