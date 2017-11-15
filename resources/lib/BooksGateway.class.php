<?php

class BooksGateway extends TableDataGateway {

    public function __construct($connect) {
    parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT BookID, ISBN10, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, Trim Size, PageCountsEditorialEst,
         LatestInStockDate, Description, CoverImage FROM Books ";
        
    }
    
    protected function getOrderFields() {
        return 'Title';
    }
    
    protected function getPrimaryKeyName() {
        return "BookID";
    }
}

?>