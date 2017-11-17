<?php

include'TableDataGateway.class.php';

class BooksGateway extends TableDataGateway {

    public function __construct($connect) {
    parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return "SELECT BookID, ISBN10, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, BindingTypeID, TrimSize, PageCountsEditorialEst,
         LatestInStockDate, Description, CoverImage, Imprint, SubcategoryName FROM Books JOIN Imprints using (ImprintID) JOIN Subcategories using (SubcategoryID) ";
        
    }
    
    protected function getOrderFields() {
        return 'Title LIMIT 20';
    }
    
    protected function getPrimaryKeyName() {
        return "BookID";
    }
}

?>