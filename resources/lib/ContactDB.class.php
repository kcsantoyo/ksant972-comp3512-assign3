<?php
/*
   Simple Gateway class for the EmployeeMessages table. 

 */
class ContactDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT ContactID, FirstName, LastName, Email FROM Contacts";
    
    //constructor will be passed the database connection
    public function __construct($connection) {
        $this -> connect = $connection;
    }
    
    //return all the records
    public function getAll() {
        $sql = self::$baseSQL;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();
    }
    
    //return just a single record whose key value = passed parameter
    public function findById($id) {
        $sql = self::$baseSQL . ' WHERE ContactID=:id ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array(':id' => $id));
        return $statement->fetch();
    }

}

?>