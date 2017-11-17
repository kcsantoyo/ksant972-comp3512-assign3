<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

        <link rel="stylesheet" href="resources/css/styles.css">

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
        
        <script src="resources/js/single-book.js"></script>
    </head>

<?php 
include 'resources/includes/connect.php';
include 'resources/includes/phpfunctions.php';
include 'resources/lib/BooksGateway.class.php';

<<<<<<< HEAD
<?php 
include 'resources/includes/connect.php';
include 'resources/lib/BooksGateway.class.php';

=======
>>>>>>> Finished the Data Access layer, and retro fitting all the classes, changed the About us page
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
                
                <div class="mdl-cell mdl-cell--1-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title  mdl-color--orange">
                        <h2 class='mdl-card__title-text'>Authors</h2>
                        </div>
                        <ul class='demo-list-item mdl-list'>
                            
                        <?php
                            /*$sql = "select * from
                                    Authors as a
                                    JOIN BookAuthors as ba on a.AuthorID=ba.AuthorID
                                    JOIN Books as b ON ba.BookID=b.BookID
                                    WHERE b.ISBN10 LIKE '".$_GET['ISBN10']."';"; */
                                    
                                $result = $books->findAuthorsByISBN();
                                foreach($result as $row) {
                                    if($row['ISBN10'] == $_GET['ISBN10']) {
                                        echo "<li>  ".$row['FirstName']." ".$row['LastName']."</li>";
                                }
                            }
                        ?>    
                            
                        </ul>
                    
                    
                </div>
            
            
               <div class="mdl-cell mdl-cell--1-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title  mdl-color--orange">
                        <h2 class='mdl-card__title-text'>Universities</h2>
                    </div>
                        <ul class='demo-list-item mdl-list'>
                            
                            <?php
                            /*$sql = "select * from
                                    Universities as u
                                    JOIN Adoptions as a ON u.UniversityID=a.UniversityID
                                    JOIN AdoptionBooks as d ON a.AdoptionID=d.AdoptionID
                                    JOIN Books as b ON d.BookID=b.BookID
                                    WHERE b.ISBN10 LIKE '".$_GET['ISBN10']."';";*/
                                    
                                $result = $books->findUniversitiesByISBN();
                                foreach ($result as $row) {
                                    if($row['ISBN10'] == $_GET['ISBN10']) {
<<<<<<< HEAD
                                        echo "<li>  ".$row['Name']."</li>";
=======
                                        echo '<li><a href="browse-universities.php?id='. $row['UniversityID'] . '">' .
                                            $row['Name'] .'</a></li>';
>>>>>>> Finished the Data Access layer, and retro fitting all the classes, changed the About us page
                                    }
                                }
                        ?>    
                            
                        </ul>
                </div>
                
                
               <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                    <div class="mdl-card__title  mdl-color--orange">
                    
                    <?php
                    /*$sql = "select * 
                                from Books as b 
                                JOIN Subcategories as s ON b.SubcategoryID=s.SubcategoryID 
                                JOIN Imprints as i ON b.ImprintID=i.ImprintID
                                JOIN Statuses as p ON b.ProductionStatusID=p.StatusID
                                JOIN BindingTypes as t ON b.BindingTypeID=t.BindingTypeID
                                JOIN BookAuthors as n ON b.BookID=n.BookID
                                JOIN Authors as a ON n.AuthorID=a.AuthorID
                                WHERE b.ISBN10 LIKE '".$_GET['ISBN10']."';";*/
                                
                                $result = $books->grabAllSingleInfo();
                                
                                $hasBeenFound = false;
                                
                                foreach($result as $row) {
                                    if($row['ISBN10'] == $_GET['ISBN10'] && $hasBeenFound == false){
                                            
                                    echo "<h2 class='mdl-card__title-text'>".$row["Title"]."</h2></div>";
               
                                    echo "<center><img id='currentImg' src='book-images/medium/".$row["ISBN10"].".jpg'/></center>
                                        <div id='imgPop' class='lrgImg'>
                                            <img class='modal-content' id='bookImage'>
                                        </div>";
                                        
                                    $largeISBN = $row['ISBN10'];
    
                                    echo "<table id='singleBookTable' class='mdl-data-table mdl-js-data-table'>";
                                    echo generatetableRow("ISBN10", $row["ISBN10"]);
                                    echo generatetableRow("ISBN13", $row["ISBN13"]);
                                    echo generatetableRow("Copyright Year", $row["CopyrightYear"]);
                                    echo generatetableRow("Subcategory", '<a href="browse-books.php?subcategory='. $row['SubcategoryID'] . '">' .
                                            $row["SubcategoryName"]) . '</a>';
                                    echo generatetableRow("Imprint", '<a href="browse-books.php?imprint='. $row['ImprintID'] . '">' .
                                            $row["Imprint"]) . '</a>';
                                    echo generatetableRow("Production Status", $row["Status"]);
                                    echo generatetableRow("Binding Type", $row["BindingType"]);
                                    echo generatetableRow("Trim Size", $row["TrimSize"]);
                                    echo generatetableRow("Page Count", $row["PageCountsEditorialEst"]);
                                    echo "<tr>
                                            <td class='mdl-data-table__cell--non-numeric'><strong>Description</strong></td>
                                            <td class='mdl-data-table__cell--non-numeric'><p id='bookData'>".$row['Description']."</p></td> 
                                            </tr>";
                                    echo "</table>
                                    </div>";
                                    $hasBeenFound = true;
                                    echo '<div id="ISBN">' . $largeISBN . '</div>';
                                    }
                                }
                    ?>

                            
                    
                            
                    </div>
                </div>
                
    
            
                
</div>

</section>            
</main>     
</div>