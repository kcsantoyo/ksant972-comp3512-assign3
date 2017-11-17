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

        <link rel="stylesheet" href="resources/css/styles.css"></body>

        <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-orange.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    </HEAD>

      <?php 
      include 'resources/includes/redirect.php';
      include 'resources/includes/connect.php';
      include 'resources/includes/currentURL.php';
      include 'resources/lib/UniversitiesGateway.class.php';
      include 'resources/lib/StateDB.class.php';
      //$id = $_GET["id"];
      
      $states = new StateDB($connection);
      $universities = new UniversitiesGateway($connection);
      ?>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">

     <?php include 'resources/includes/header.php'; ?>
    <?php include 'resources/includes/nav.php'; ?>

    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">
                
                              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">University Information</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <div class="mdl-tabs__tab-bar">
                              <a href="#address-panel" class="mdl-tabs__tab is-active">About</a>
                          </div>

                          <div class="mdl-tabs__panel is-active" id="address-panel">
                            <?php   
                             //$sql = "select * from Universities where UniversityID LIKE '".$id."';";
                             
                             if(isset($_GET['id'])) {
                              $row = $universities->findById($_GET['id']);
                                echo "<h3>".$row["Name"]."</h3>";
                                echo "<p>".$row["Address"];
                                echo "<br/>".$row["City"].", ".$row["State"];
                                echo "<br/>".$row["Zip"];
                                echo "<br/><a href='".$row["Website"]."'>".$row["Website"]."</a>";
                                echo "<div id='map'></div>";
                                ?>
                                
                                <script type="text/javascript">
                                function initMap() {
                                 var uluru = {lat: <?php echo $row["Latitude"]?>, lng: <?php echo $row["Longitude"]?> };
                                 var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 17,
                                  center: uluru
                                 });
                                 var marker = new google.maps.Marker({
                                 position: uluru,
                                 map: map
                                 });
                                }
                                </script>
                                
                            <?php
                                echo "<script language='javascript'> initMap() </script>";
                                echo "<script language='javascript' async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBdDRfl6i_MsKQM_OKDwoi3ywOpr-HXkSs&callback=initMap'>
                                </script>";
                             }
                            
                            ?>
                            
                          </div>
                          
                        </div>
                        </div>

      
                </div>

              <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Universities</h2>
                </div>
                
                
                    <select form="state" name='state'> 
                        <option value="" disabled selected>Choose a State</option>
                        <?php
                         //$sql = "select * from States;";
                        
                         foreach($states->getAll() as $row){
                               echo "<option value='".$row['StateId']."'>".$row['StateName']."</option>";
                            }
                    ?>
                    </select>
                <form action="browse-universities.php" method="get" id="state">
                    <div class="btnMargin">
                        <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" name="" value="Filter Universities"/>
                    </div>   
                   <div class="btnMargin">
                       <a href="browse-universities.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Remove Filter</a>
                   </div>
               </form>
               
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                  <?php
                        if (isset($_GET['state'])){
                            //$sql = "Select * from Universities where State = (Select StateName from States Where StateId Like ".$_GET['state'].") ORDER by Name LIMIT 20;";
                            $resultState = $states->findById($_GET['state']);
                            $result = $universities->findUniversityByState($resultState['StateName']);
                        }
                        else {
                            //$sql = "Select * from Universities ORDER BY Name limit 20;";
                            $result = $universities->findAll('Name Limit 20');
                        }
                        
                        foreach($result as $row) {
                                echo "<li>
                                      <a href='browse-universities.php?id=".$row['UniversityID']."'>"
                                      .$row['Name']
                                        ."</a></li>";
                        }
                  ?>

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
</div>
        </section>
    </main>

</body>
</html>