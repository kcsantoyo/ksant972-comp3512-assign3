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
    
    protected function getSelectStatementSingleAuthor() {
        return "SELECT AuthorID, FirstName, LastName, Institution, BookAuthorID, 'Order', BookID, ISBN10, ISBN13, Title,
        CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, TrimSize, PageCountsEditorialEst, LatestInStockDate, Description, CoverImage
        FROM Authors JOIN BookAuthors using (AuthorID) JOIN Books using (BookID) ";
    }
    
    protected function getSelectStatementSingleUniversities() {
        return "SELECT UniversityID, Name, Address, City, State, Zip, Website, Longitude, Latitude, AdoptionID,
        UniversityID, ContactID, AdoptionDate, AdoptionDetailID, AdoptionID, BookID, Quantity, ISBN10 FROM Universities JOIN Adoptions
        using (UniversityID) JOIN AdoptionBooks using (AdoptionID) JOIN Books using (BookID) ";
    }
    
    protected function getSelectStatementSingleAllInfo() {
        return "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryID, ImprintID, ProductionStatusID, TrimSize,
        PageCountsEditorialEst, LatestInStockDate, Description, CoverImage, SubcategoryID, CategoryId, SubcategoryName, 
        ImprintID, Imprint, StatusID, Status, BindingTypeID, BindingType, BookAuthorID, BookId, AuthorId, 'Order', AuthorID,
        FirstName, LastName, Institution FROM Books JOIN Subcategories using (SubcategoryID) JOIN Imprints using (ImprintID) 
        JOIN Statuses ON Books.ProductionStatusID=Statuses.StatusID JOIN BindingTypes using (BindingTypeID) JOIN BookAuthors using (BookID) JOIN
        Authors using(AuthorID) ";
    }
    
    protected function getOrderFields() {
        return 'Title LIMIT 20';
    }
    
    protected function getPrimaryKeyName() {
        return "BookID";
    }
}

?>