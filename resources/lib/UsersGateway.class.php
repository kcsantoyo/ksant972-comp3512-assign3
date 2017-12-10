<?php

include_once 'TableDataGateway.class.php';

class UsersGateway extends TableDataGateway {

    public function __construct($connect) {
    parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email, Privacy FROM Users ";
        
    }
    
    protected function getInsertStatement() {
        return "INSERT INTO Users (UserID, FirstName, LastName, Address, City, Region, Country, Postal, Phone, Email) ";
    }
    
    protected function getUpdateStatement() {
        return "UPDATE Users SET";
    }
    
    protected function getUpdateFields($field, $value) {
        return $field." = '".$value."'";
    }
    
    protected function getOrderFields() {
        return 'LastName, FirstName';
    }
    
    protected function getPrimaryKeyName() {
        return 'UserID';
    }
}

?>