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

        <link rel="stylesheet" href="resources/css/styles.css"></body>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>

        <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    </HEAD>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
    
    <?php 
    include 'resources/includes/header.php'; 
    include 'resources/includes/nav.php';
    include 'resources/includes/connect.php';
    include 'resources/lib/UsersGateway.class.php';
    include 'resources/lib/LoginGateway.class.php';
    include 'resources/includes/phpfunctions.php';
    
    $users = new UsersGateway($connection);
    $login = new LoginGateway($connection)
    ?>

<main class="mdl-layout__content mdl-color--grey-50">
    <section class='page-content'>
        
        <div class='mdl-grid'>
            <?php
                $userResult = $users->findById($_SESSION['UserID']);
            ?>
            <!-- <div class="mdl-layout-spacer"></div> -->
            <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title  mdl-color--orange">
                <?php
                
                    echo "<h2 class='mdl-card__title-text'>User Information</h2></div>";
                    echo "<table class='mdl-data-table mdl-js-data-table full-width'>";
                    echo generatetableRow("First Name", $userResult['FirstName']);
                    echo generatetableRow("Last Name", $userResult['LastName']);
                    echo generatetableRow("Address", $userResult['Address']);
                    echo generatetableRow("City", $userResult['City']);
                    echo generatetableRow("Region", $userResult['Region']);
                    echo generatetableRow("Country", $userResult['Country']);
                    echo generatetableRow("Phone", $userResult['Phone']);
                    echo generatetableRow("Email", $userResult['Email']);
                    echo "</table>
                                    </div>";
                ?>
            </div>
            <div class="mdl-layout-spacer"></div>
            
        </div>
        
    </section>
</main>