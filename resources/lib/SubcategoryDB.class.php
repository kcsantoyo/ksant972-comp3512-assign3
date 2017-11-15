<?php
/*
   Simple Gateway class for the Subcategories table. 

 */
class SubcategoriesDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT SubcategoryID, CategoryID, SubcategoryName FROM Subcategories";
    private static $constraint = " ORDER BY SubcategoryName";
    
    //constructor will be passed the database connection
    public function __construct($connection) {
        $this -> connect = $connection;
    }
    
    //return all the records
    public function getAll() {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();
    }
    
    //return just a single record whose key value = passed parameter
    public function findById($id) {
        $sql = self::$baseSQL . ' WHERE SubcategoryID=:id ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array(':id' => $id));
        return $statement->fetch();
    }

}

?>