<?php
session_start();
$_SESSION['countryCode'] = $_GET['code'];
?>

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
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
        <script type="text/javascript" src="resources/js/analytics.js"></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
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
        <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Visitors in June</h2>
                </div>
                <div class="mdl-card__supporting-text" id="totalVisitsJune">
                </div>
                </div>
       
            
            <!-- total number of unique countries the site had visitors from -->    
            <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Unique Visitors</h2>
                </div>
                <div class="mdl-card__supporting-text" id="totalUniqueVisits">
                </div>
            </div>
        
                
            <!-- total number of employee to-dos in june 2017 -->
             <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Employee To-Dos</h2>
                </div>
                <div class="mdl-card__supporting-text" id="totalToDo">
                </div>
                </div>
            
            <!-- total number of employe messages in June 2017 -->        
                <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Employee Messages</h2>
                </div>
                <div class="mdl-card__supporting-text" id="totalMessages">
                </div>
                </div>
                
            <!-- country visits -->      
                <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Country Visits</h2>
                </div>
                <div class="mdl-card__supporting-text" id="countryVisits">
                    <form action="analytics.php" method="GET">
                        <select name="code" id="countryCodeList">
                            <option value="" disabled selected>Select a Country Code</option>
                        </select>
                        <div class="btnMargin">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Get Visits</button>
                        </div>
                            <p id='cName'></p>
                            <p id='cVisits'></p>
                    </form>
                </div>
            </div>
            </div>

        <!-- top 15 countries and count  -->
        <div class="mdl-grid">
             <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Top 15 Countries</h2>
                </div>
                <div class="mdl-card__supporting-text" >
                    <select id="top15CountriesList">
                        <option value="" disabled selected>Select a Country</option>
                    </select>
                    <div id="countryInfo"></div>
                </div>
            </div>
            
            <!-- table of top ten adopted books -->
             <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp">
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
                      <tbody  id="top15Books">
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">June Daily Visits Chart</h2>  
                    </div>
                    <div id="chartDiv" style="width 100%; height: 500px;"></div>
    
            </div>
             <div class="mdl-cell mdl-cell--6-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Geo Chart</h2>  
                    </div>
                    <div id="regionsDiv" style="width 100%; height: 500px;"></div>
        
            </div>
        
    </div>
            
    </body>
</html>