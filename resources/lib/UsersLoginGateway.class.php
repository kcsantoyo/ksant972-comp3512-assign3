<?php

include_once 'TableDataGateway.class.php';

class UsersLoginGateway extends TableDataGateway {

    public function __construct($connect) {
    parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT UserID, UserName, Password, State, DateJoined, DateLastModified FROM UsersLogin ";
        
    }
    
    protected function getInsertStatement() {
        return "INSERT INTO UsersLogin (UserID, UserName, Password, Salt, DateJoined, DateLastModified) ";
    }
    
    protected function getUpdateStatement($email, $currentTime) {
        return 'UPDATE UsersLogin SET UserName = "' . $email . '", DateLastModified = "' . $currentTime . '"';
    }
    
    protected function getOrderFields() {
        return 'UserName';
    }
    
    protected function getPrimaryKeyName() {
        return "UserID";
    }
}

?>