<?php
session_start();
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

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php 
          include 'resources/includes/redirect.php';
          include 'resources/includes/header.php';
          include 'resources/includes/nav.php';
          include 'resources/includes/currentURL.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

        <div class="mdl-grid">
            
            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">About Us</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <p class='mdl-card__title-text'>Team Porg<p>
                    <ul>
                        <li><img src="resources/images/porg.jpeg" class="mdl-card__media"></li>
                        <li><strong>Creators: </strong>George Chase, Nick Anderson, Kim Santoyo, Jamie Nguyen</li>
                        <li><strong>Course Name:</strong> COMP 3512 - Web II</li>
                        <li><strong>Assignment: </strong>3</li>
                        <li><strong>Date:</strong> <?php echo date('l jS \of F Y h:i:s A'); ?></li>
                        <li><strong>Purpose: </strong>The main purpose of this website is educational only, it is for the COMP 3512 course taught by Randy Connolly
                        at Mount Royal University</li>
                    </ul>
                </div>
            </div>
            
            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Who did what?</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul>
                        <li><strong>George Chase: </strong> Completed the Program Design, Login/Logout, Browse Employees, Analytics</li>
                        <li><strong>Kim Santoyo: </strong> Completed the Navigation, User Profile, Login/Logout, Analytics</li>
                        <li><strong>Jamie Nguyen: </strong> Completed the Browse Employees, Simple Search, Analytics</li>
                        <li><strong>Nick Anderson: </strong> Completed the Browse Universites, Browse Employees, Single Book, Analytics</li>
                    </ul>
                </div>
            </div>
            
            <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                    <h2 class="mdl-card__title-text">Resources Used</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul>
                        <li><strong>MDL (Materials Design Lite)</strong></li>
                        <li><strong>All images were from Google minus the book covers</strong></li>
                        <li><strong>Some sweet javascript was incorporated in this bad boy</strong></li>
                        <li><a href='https://github.com/kcsantoyo/ksant972-comp3512-assign3.git'>https://github.com/kcsantoyo/ksant972-comp3512-assign3</a></li>
                        <li><strong>Portions of Geo Chart code taken from</strong> <a href='https://developers.google.com/chart/interactive/docs/gallery/geochart'>Google  Geo Charts Guide</a></li>
                        <li><strong>Portions of Area Chart code taken from</strong> <a href='https://developers.google.com/chart/interactive/docs/gallery/areachart'>Google Area Charts Guide</a></li>
                    </ul>
                    </ul>
                </div>
            </div>
            
    </body>
</html>