<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

        <link rel="stylesheet" href="resources/css/styles.css"></body>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    </HEAD>

<?php 
    include 'resources/includes/connect.php';
    include 'resources/lib/SubcategoryDB.class.php';
    include 'resources/lib/ImprintDB.class.php';
    include 'resources/lib/BooksGateway.class.php';
    //$subcategoryId = $_GET['subcategory'];
    //$imprintId = $_GET['imprint'];
    
    $subcategories = new SubcategoryDB($connection);
    $imprints = new ImprintDB($connection);
    $books = new BooksGateway($connection);
?>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  
    <?php include 'resources/includes/header.php'; ?>
    <?php include 'resources/includes/nav.php'; ?>

<main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

    
    <div class="mdl-grid">
        
        <div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
            <div class="mdl-card__title  mdl-color--orange">
                <h2 class="mdl-card__title-text">Books</h2>
            </div>
            
            <table class="mdl-data-table mdl-js-data-table full-width">
                <thead>
                    <tr>
                        
                        <th class="mdl-data-table__cell--non-numeric">Cover</th>
                        <th class="mdl-data-table__cell--non-numeric">Title</th>
                        <th class="mdl-data-table__cell--non-numeric">Year</th>
                        <th class="mdl-data-table__cell--non-numeric">Subcategory</th>
                        <th class="mdl-data-table__cell--non-numeric">Imprint</th>
                    </tr>
                
                </thead>
                <tbody>
                    
                    <?php
                    
                    $resultBooks = $books->findAll("Title");
                    $resultEnd = $resultBooks;
                    
                    $bookArray = array();
                    
                    if(isset($_GET['subcategory']) && !isset($_GET['imprint'])){
                        foreach($resultEnd as $result) {
                            if($result['SubcategoryID'] == $_GET['subcategory']) {
                                $bookArray[] = $result;  
                            }
                        }
                    }
                    else if(isset($_GET['imprint']) && !isset($_GET['subcategory'])) {
                        foreach($resultEnd as $result) {
                            if($result['ImprintID'] == $_GET['imprint']) {
                                $bookArray[] = $result;  
                            }
                        }
                    }
                    else if(isset($_GET['imprint']) && isset($_GET['subcategory'])) {
                        foreach($resultEnd as $result) {
                            if($result['SubcategoryID'] == $_GET['subcategory'] && $result['ImprintID'] == $_GET['imprint']) {
                                $bookArray[] = $result;  
                            }
                        }
                    }
                    else {
                        $bookArray = $resultEnd;
                    }
                        
                        $index = 0;
                        foreach($bookArray as $row){
                            if($index < 20) {
                            echo "<tr>
                                    <td class='mdl-data-table__cell--non-numeric'><a href='single-book.php?ISBN10=".$row['ISBN10'].
                                    "'><img src='book-images/tinysquare/".$row["ISBN10"].".jpg'></img></a></td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$row["Title"]."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$row["CopyrightYear"]."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$row["SubcategoryName"]."</td>
                                    <td class='mdl-data-table__cell--non-numeric'>".$row["Imprint"]."</td>
                                  </tr>";
                                  $index++;
                            }
                            
                        }
                    ?>
                    
                </tbody>
            </table>
            
        </div> <!-- mdl card (books) -->
        
         <div class="mdl-cell mdl-cell--1-col card-lesson mdl-card  mdl-shadow--2dp">
            <div class="mdl-card__title  mdl-color--orange">
                <h2 class="mdl-card__title-text">Subcategories</h2>
            </div>
             <div class="mdl-card__supporting-text">
                 <div>
                   <a href="browse-books.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Remove Filter</a>
                 </div>
                <?php
                
                //$sql = "Select * from Subcategories;";
                
                echo "<p class='mdl-card__title-text'>Subcategories:<p>";
                echo "<ul class='demo-list-item mdl-list'>";
                foreach($subcategories->getAll() as $row){
                    echo"<li><a href='browse-books.php?subcategory=".$row["SubcategoryID"]."'>".$row["SubcategoryName"]."</a></li>";
                }
                echo "</ul>";
                ?>
            </div>
        </div> <!-- mdl card (Subcategories) -->
                
                
                <div class="mdl-cell mdl-cell--1-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title  mdl-color--orange">
                        <h2 class="mdl-card__title-text">Imprints</h2>
                    </div>
                 <div class="mdl-card__supporting-text">
                     <div>
                       <a href="browse-books.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Remove Filter</a>
                     </div>
                 </div>
                
                <?php
                
                //$sql = "Select * from Imprints;";
                
                echo "<p class='mdl-card__title-text'>Imprints:</p>";
                echo "<ul class='demo-list-item mdl-list'>";
                foreach($imprints->getAll() as $row){
                    echo"<li><a href='browse-books.php?imprint=".$row["ImprintID"]."'>".$row["Imprint"]."</a></li>";
                }
                echo "</ul>";
            ?>
            </div> <!-- mdl card (Imprints) -->
        
    </div> <!-- MDL grid end -->
  
  
</section>  
</main>  
  
  </div>



</body>
</html>