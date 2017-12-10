<?php
/*
  Encapsulates common functionality needed by all table gateway objects.
 
  Table Data Gateway is an enterprise data pattern identified by Fowler. This pattern's 
  intent is to encapsulate the full interaction with a database table. It is also 
  referred to by some as the data access object (DAO) pattern.
 
  Inspiration:
         http://martinfowler.com/eaaCatalog/tableDataGateway.html
         http://css.dzone.com/books/practical-php-patterns-table
         https://speakerdeck.com/hhamon/database-design-patterns-with-php-53
 */
 
abstract class TableDataGateway
{
   // contains connection
   protected $connection;
   
   /*
      Constructor is passed a database adapter (example of dependency injection)
   */
   public function __construct($connect) 
   {
      if (is_null($connect) )
         throw new Exception("Connection is null");
         
      $this->connection = $connect;
   }
   
   // ***********************************************************
   // ABSTRACT METHODS
   
   /*
     The name of the table in the database
   */    
   abstract protected function getSelectStatement();

   /*
     A list of fields that define the sort order
   */   
   abstract protected function getOrderFields();
   
   /*
     The name of the primary keys in the database ... this can be overridden by subclasses
   */    
   abstract protected function getPrimaryKeyName();
   
   // ***********************************************************
   // PUBLIC FINDERS 
   //
   // All of these finders return either a single or array of the appropriate DomainObject subclasses
   //
   
   /*
      Returns all the records in the table
   */
   public function findAll($sortFields=null) {
      $sql = $this->getSelectStatement();
      //add sort order if required
      if(! is_null($sortFields)) {
         $sql .= ' ORDER BY ' . $sortFields;
      }
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetchAll();
   }
   
   /*
      Returns all the records in the table sorted by the specified sort order
   */
   public function findAllSorted($ascending) {
      $sql = $this->getSelectStatement() . ' ORDER BY ' . $this->getOrderFields();
      if(! $ascending) {
         $sql .= " DESC";
      }
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetchAll();
   }
   
   /*
      Returns a record for the specificed ID
   */
  public function findById($id) {
     $sql = $this->getSelectStatement() . ' WHERE ' . $this->getPrimaryKeyName() . '=:id';
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id));
     return $statement->fetch();
  }
  
  /*
      Returns all records that are universities in that state
  */
  public function findUniversityByState($state) {
     $sql = $this->getSelectStatement() . ' WHERE ' . $this->getStateName() . '=:state';
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':state' => $state));
     return $statement->fetchAll();
  }
  
  /*
      Returns all records that are Authors for that ISBN10
  */
  public function findAuthorsByISBN() {
     $sql = $this->getSelectStatementSingleAuthor();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  /*
      Returns all records that are Universities for the ISBN10
  */
  public function findUniversitiesByISBN() {
     $sql = $this->getSelectStatementSingleUniversities();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  /*
      Returns all records for the Single Book information
  */
  public function grabAllSingleInfo() {
     $sql = $this->getSelectStatementSingleAllInfo();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  /*
      Returns all Distinct Cities
  */
  public function grabAllDistinctCities($sortFields=null) {
     $sql = $this->getSelectStatementDistinctCity();
     if(! is_null($sortFields)) {
         $sql .= ' ORDER BY ' . $sortFields;
      }
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  public function findAllEmployeesByLastName($last) {
     $sql = $this->getSelectStatement() . "WHERE LastName LIKE " . ':last';
     $wildLast = $last . "%";
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':last' => $wildLast));
     return $statement->fetchAll();
  }
  
  public function findAllEmployeesByCity($city) {
     $sql = $this->getSelectStatement() . ' WHERE City ' . '=:city';
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':city' => $city));
     return $statement->fetchAll();
  }
  
  public function findAllEmployeesByCityAndLastName($last, $city) {
     $sql = $this->getSelectStatement() . 'WHERE City ' . '=:city' . ' AND ' . 'LastName LIKE ' . ':last';
     $wildLast = $last . "%";
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':city' => $city, ':last' => $wildLast));
     return $statement->fetchAll();
  }
  
  public function getAllUniqueCountryCodes() {
     $sql = $this->getSelectStatementUniqueCountryCodes();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  public function getCountryAndVisits($countryCode) {
     $sql = $this->getSelectStatementForCountryAndVisits() . ' WHERE c.CountryCode ' . '=:countryCode' . ' GROUP BY c.CountryCode ';
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':countryCode' => $countryCode));
     return $statement->fetchAll();
  }
  
  public function getGeoChartData() {
     $sql = $this->getSelectStatementForCountryAndVisits() . ' GROUP BY CountryName HAVING COUNT(VisitID) > 10';
      
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  public function getTop15Country() {
     $sql = $this->getSelectStatementForTop15Countries();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  public function getTop10AdoptedBooks() {
     $sql = $this->getSelectStatementTop10AdoptedBooks();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetchAll();
  }
  
  public function getDailyVisitsInJune(){
      $sql = $this->getSelectStatementForDailyVisitsInJune();
      
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetchAll();
  }
  
  public function getTotalVisitsInJune() {
     $sql = $this->getSelectStatementTotalVisitsInJune() . " WHERE DateViewed BETWEEN '05/31/2017' AND '07/01/2017'";
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetch();
  }
  
  public function getTotalUniqueVisits() {
     $sql = $this->getSelectStatementTotalUniqueVisits();
     
     $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
     return $statement->fetch();
  }

   public function getTotalToDosInJune() {
      $sql = $this->getSelectStatementEmployeeToDosInJune() . " WHERE DateBy BETWEEN '2017-05-31' AND '2017-07-01'";
   
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetch();
   }
   
   public function getTotalNumEmpMsgJune() {
      $sql = $this->getSelectStatementEmployeeMessagesInJune() . " WHERE MessageDate BETWEEN '2017-05-31' AND '2017-07-01'";
      
      $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
      return $statement->fetch();      
   }
   
   public function addUser($userID, $first, $last, $address, $city, $region, $country, $postal, $phone, $email) {
       $sql = $this->getInsertStatement() . " VALUES ('$userID', '$first', '$last', '$address', '$city', '$region', '$country', '$postal', '$phone', '$email')";
       
       DatabaseHelper::runQuery($this->connection, $sql, null);
   }
   
   public function addUserLogin($userID, $email, $password, $salt, $date) {
       $sql = $this->getInsertStatement() . " VALUES ('$userID', '$email', '$password', '$salt', '$date', '$date')";
       
       DatabaseHelper::runQuery($this->connection, $sql, null);
   }
   
   public function getLastUserID() {
       $sql = $this->getSelectStatement() . " ORDER BY UserID DESC LIMIT 1";
       
       $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
       return $statement->fetch();
   }
   
   public function checkIfUserExists($userName) {
       $sql = $this->getSelectStatement() . ' WHERE UserName ' . '=:userName';
       
       $statement = DatabaseHelper::runQuery($this->connection, $sql, Array(':userName' => $userName));
       return $statement->fetchAll();
   }
   
   public function updateUserInfo($infoArray, $id) {
       $sql = $this->getUpdateStatement() . ' ';
       $i = 0;
       foreach($infoArray as $key => $value){
           $sql .= $this->getUpdateFields($key, $value);
           if($key != 'Email'){
               $sql .= ", ";
           }
       }
   
       $sql .= ' WHERE ' . $this->getPrimaryKeyName() . ' =:id';
       echo $sql;
       DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => (int)$id));
   }
   
   public function updateUserLoginInfo($email, $currentTime, $id) {
        $sql = $this->getUpdateStatement($email, $currentTime) . ' WHERE ' . $this->getPrimaryKeyName() . ' = :id ';
        
        DatabaseHelper::runQuery($this->connection, $sql, Array(':id' => $id)); 
   }
   
}
?>