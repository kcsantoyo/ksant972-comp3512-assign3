<?php

include'TableDataGateway.class.php';

class AnalyticsGateway extends TableDataGateway {

    public function __construct($connect) {
    parent::__construct($connect);
    }
    
    
    
    protected function getSelectStatementForTop15Countries() {
        return  "Select CountryName, Count(VisitID) as visitCount from Countries as 
        c JOIN BookVisits as b ON c.CountryCode = b.CountryCode Group BY c.CountryCode ORDER BY visitCount DESC LIMIT 15; ";
        
    }
    
    protected function getSelectStatementTop10AdoptedBooks() {
        return "SELECT Title, ISBN10, b.BookID as Id, count(AdoptionID) as Adoptions 
                FROM Books as b JOIN AdoptionBooks as a on b.BookID = a.BookID 
                GROUP BY b.BookID 
                ORDER BY Adoptions DESC
                LIMIT 10";
    }
    
    protected function getSelectStatementTotalVisitsInJune() {
        return "SELECT Count(DateViewed) as totalVisits FROM BookVisits";
    }
    
    protected function getSelectStatementEmployeeToDosInJune()  {
        return "SELECT Count(ToDoID) as ToDos FROM EmployeeToDo";
    }
    
    protected function getSelectStatementTotalUniqueVisits() {
        return "SELECT Count(DISTINCT CountryCode) as uniqueCountries FROM BookVisits";
    }
    
    protected function getSelectStatementEmployeeMessagesInJune() {
        return "SELECT count(MessageID) as numMsg FROM EmployeeMessages";
    }
    
    protected function getSelectStatement() {
        return "";
    }
  
    protected function getOrderFields() {
        return "";
    }
   
    protected function getPrimaryKeyName() {
        return "";
    }

}

?>