<?php

class MySqlTools{
    private static function bindParams($theStatement, $theParams){
        $theStatement->bind_param($theParams[0],...$theParams[1]);
    }
    public static function RunQuery($theConnection, $theQuery, $theParams){
        $statement = $theConnection->prepare($theQuery);
        self::bindParams($statement, $theParams);
        $statement->execute();
    }
    public static function RunQueryAndGetResult($theConnection, $theQuery, $theParams){
        $statement = $theConnection->prepare($theQuery);
        self::bindParams($statement, $theParams);
        $statement->execute();
        return $statement->get_result();
    }
}