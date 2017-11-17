<<<<<<< HEAD
=======
<?php
session_start();
?>
>>>>>>> Finished the Data Access layer, and retro fitting all the classes, changed the About us page
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

        <link rel="stylesheet" href="resources/css/styles.css"></body>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
<<<<<<< HEAD
    <?php include 'resources/includes/header.php'; ?>
    <?php include 'resources/includes/nav.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Analytics</h2>
                </div>
                <div class="mdl-card__supporting-text">
=======
    <?php
    include 'resources/includes/redirect.php';
    include 'resources/includes/header.php';
    include 'resources/includes/nav.php';
    include 'resources/includes/currentURL.php';
    include 'resources/includes/connect.php';
    include 'resources/lib/AnalyticsGateway.class.php';
    $analytics = new AnalyticsGateway($connection);
    ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">
            
        <div class="mdl-grid">
            <!-- This is the total visits in june -->
        <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Visitors in June</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php
                    
                    $result = $analytics->getTotalVisitsInJune();
                    echo '<h3>'.$result['totalVisits'].'</h3>';
                    echo "Total # of visits in June";
                    
                    ?>
                </div>
                </div>
       
            
            <!-- total number of unique countries the site had visitors from -->    
            <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Unique Country Visitors</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php
                    
                        $result = $analytics->getTotalUniqueVisits();
                        foreach($result as $row) {
                            echo '<h3>' . $row['uniqueCountries'] . '</h3>';
                            echo 'Total # of Unique Countries Visited This Site';
                        }
                    
                    ?>
                </div>
            </div>
        
                
            <!-- total number of employee to-dos in june 2017 -->
             <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Employee To-Dos in June</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php
                    
                    $result = $analytics->getTotalToDosInJune();
                    echo '<h3>'.$result['ToDos'].'</h3>';
                    echo "Total # of employee to dos in June";
                    
                    ?>
                </div>
                </div>
            
            <!-- total number of employe messages in June 2017 -->        
                <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Employee Messages in June</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php
                        $result = $analytics->getTotalNumEmpMsgJune();
                        echo '<h3>' . $result['numMsg'] . '</h3>';
                        echo "Total # of Messages in June";
                    ?>
                    
                    
                </div>
                </div>
            </div>

        <!-- top 15 countries and count  -->
        <div class="mdl-grid">
             <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Top 15 Countries</h2>
                </div>
                <div class="mdl-card__supporting-text">
                   <table class="mdl-data-table  mdl-shadow--2dp full-width">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">#</th>
                          <th class="mdl-data-table__cell--non-numeric">Country</th>
                          <th class="mdl-data-table__cell--non-numeric">Total Visitors</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                            $result = $analytics->getTop15Country();
                            $count = 1;
                            foreach($result as $row){
                            echo "<tr>";
                                echo "<td class='mdl-data-table__cell--non-numeric'>". $count ."</td>";
                                echo "<td class='mdl-data-table__cell--non-numeric'>".$row["CountryName"]."</td>";
                                echo "<td class='mdl-data-table__cell--non-numeric'>".$row["visitCount"]."</td>";
                            echo "</tr>";
                            $count++;
                              }
                      ?>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
            
            <!-- table of top ten adopted books -->
            <div class="mdl-grid">
             <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Top 10 Adopted Books</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <table class="mdl-data-table  mdl-shadow--2dp full-width">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">#</th>
                          <th class="mdl-data-table__cell--non-numeric">Book Cover</th>
                          <th class="mdl-data-table__cell--non-numeric">Title</th>
                          <th class="mdl-data-table__cell--non-numeric">Sum Of Adoption Books</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                    <?php
                    
                     $result = $analytics->getTop10AdoptedBooks();
                            $count = 1;
                            foreach($result as $row){
                            echo "<tr>";
                                echo "<td class='mdl-data-table__cell--non-numeric'>". $count ."</td>";
                                echo "<td class='mdl-data-table__cell--non-numeric'><img src='book-images/thumb/" . $row['ISBN10'] . ".jpg'></td>";
                                echo "<td class='mdl-data-table__cell--non-numeric'><a href='single-book.php?ISBN10=" . $row['ISBN10'] . "'>" .
                                            $row["Title"] . '</a></td>';
                                echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Adoptions"]."</td>";
                            echo "</tr>";
                            $count++;
                              }
                    
                    ?>
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
>>>>>>> Finished the Data Access layer, and retro fitting all the classes, changed the About us page
            
    </body>
</html>