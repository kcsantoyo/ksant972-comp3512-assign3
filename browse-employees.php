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
        
        <script src="resources/js/browse-employees.js"></script>
    </head>
    
      <?php 
      include 'resources/includes/redirect.php';
      include 'resources/includes/connect.php';
      include 'resources/includes/currentURL.php';
      include 'resources/lib/EmployeesGateway.class.php';
      include 'resources/lib/EmployeeToDoDB.class.php';
      include 'resources/lib/EmployeeMessagesDB.class.php';
      include 'resources/lib/ContactDB.class.php';
      $employees = new EmployeesGateway($connection);
      $employeesToDo = new EmployeeToDoDB($connection);
      $employeeMessages = new EmployeeMessagesDB($connection);
      $contact = new ContactDB($connection);
      ?>

<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">

    <?php include 'resources/includes/header.php'; ?>
    <?php include 'resources/includes/nav.php'; ?>

    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">
              
              <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp">

                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Employee Details</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                          <div class="mdl-tabs__tab-bar">
                              <a href="#address-panel" class="mdl-tabs__tab is-active">Address</a>
                              <a href="#todo-panel" class="mdl-tabs__tab">To Do</a>
                              <a href="#messages-panel" class="mdl-tabs__tab">Messages</a>
                          </div>

                          <div class="mdl-tabs__panel is-active" id="address-panel">

                            <?php   
                             //$sql = "select * from Employees where EmployeeID LIKE '".$id."';";
                             
                             if(isset($_GET['id'])){
                             $row = $employees->findById($_GET['id']);
                                echo "<h3>".$row["FirstName"]." ".$row["LastName"]."</h3>";
                                echo "<p>".$row["Address"];
                                echo "<br/>".$row["City"].", ".$row["Region"];
                                echo "<br/>".$row["Country"].", ".$row["Postal"];
                                echo "<br/>".$row["Email"]."</p>";
                             } 
                              
                            ?>


                          </div>
                          <div class="mdl-tabs__panel" id="todo-panel">


                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Status</th>
                                      <th class="mdl-data-table__cell--non-numeric">Priority</th>
                                      <th class="mdl-data-table__cell--non-numeric">Content</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                        //$sql = "select * from EmployeeToDo where EmployeeID LIKE'".$id."' ORDER BY DateBy DESC;";
                                        
                                        
                                        $result = $employeesToDo->getAll();
                    
                                        if(isset($_GET['id'])){
                                        foreach($result as $row){
                                          if($row['EmployeeID'] == $_GET['id']){
                                        $date = date_create($row["DateBy"]);
                                        $date = date_format($date, "Y-M-d");
                                        echo "<tr>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$date."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Status"]."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Priority"]."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Description"]."</td>";
                                        echo "</tr>";
                                          }
                                        }
                                        }
                                  ?>
                                  </tbody>
                                </table>


                          </div>
                          
                              <div class="mdl-tabs__panel" id="messages-panel">


                                <table class="mdl-data-table  mdl-shadow--2dp">
                                  <thead>
                                    <tr>
                                      <th class="mdl-data-table__cell--non-numeric">Date</th>
                                      <th class="mdl-data-table__cell--non-numeric">Category</th>
                                      <th class="mdl-data-table__cell--non-numeric">From</th>
                                      <th class="mdl-data-table__cell--non-numeric">Message</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
                                        //$sql = "select * from EmployeeMessages where EmployeeID LIKE'".$id."' ORDER BY MessageDate DESC;";
                                        if(isset($_GET['id'])){
                                        $result = $employeeMessages->getAll();
                                        
                                        foreach($result as $row){
                                          if($row['EmployeeID'] == $_GET['id']){
                                            $date = date_create($row["MessageDate"]);
                                            $date = date_format($date, "Y-M-d");
                                            echo "<tr>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$date."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Category"]."</td>";

                                            $contactRow = $contact->findById($row['ContactID']);
                                             echo "<td class='mdl-data-table__cell--non-numeric'>".$contactRow["FirstName"]." ".$contactRow["LastName"]."</td>";
                                              
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Content"]."</td>";
                                        echo "</tr>";
                                          }
                                        }
                                        }
                                  ?>

                                  </tbody>
                                </table>


                          </div>
                        </div>
                        </div>

      
</div>

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--2-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Employees</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                  <?php
                        
                        if(isset($_GET['lastName']) && empty($_GET['city'])) {
                          $result = $employees->findAllEmployeesByLastName($_GET['lastName']);
                        }
                        else if(isset($_GET['city']) && empty($_GET['lastName'])) {
                          $result = $employees->findAllEmployeesByCity($_GET['city']);
                        }
                        else if(isset($_GET['lastName']) && isset($_GET['city'])){
                          $result = $employees->findAllEmployeesByCityAndLastName($_GET['lastName'] , $_GET['city']);
                        }
                        else {
                          $result = $employees->findAll("LastName ASC");
                        }
                        
                        if (isset($_GET['find'])) {
                          $result = $employees->findAllEmployeesByLastName($_GET['find']);
                          if (!$result){
                            $result = $employees->findAllEmployeesByCity($_GET['find']);
                          }
                        }
                        
                        foreach($result as $row) {
                            echo '<li><a href="browse-employees.php?id='. $row['EmployeeID'] . '">' .
                                  $row['FirstName']." ". $row['LastName'] .'</a></li>';
                          }
                  ?>
                    </ul>
                </div>
              </div>  
              
              <!-- / mdl-cell + mdl-card -->
              <div id="cardBorder" class="mdl-cell mdl-cell--2-col card-lesson mdl-card">
                <div id="cardTitle" class="mdl-card__title mdl-color--orange">
                  <h2 id="filter" class="mdl-card__title-text">Filters: Show</h2>
                </div>
                <div id="filterContent" class="mdl-card__supporting-text">
                  <ul class="demo-list-item mdl-list">
                    <form action="browse-employees.php" method="GET">
                      <select name="city">
                        <option value="" disabled selected>Choose a City</option>
                        <?php
                          foreach($employees->grabAllDistinctCities("City") as $row) {
                            echo "<option value='".$row['City']."'>".$row['City']."</option>";
                          }
                        ?>
                      </select>
                      <input id="searchEmp" type="text" name="lastName" placeholder="Search by Last Name">
                      <br>
                      
                      <div class="btnMargin">
                      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Filter</button>
                      </div>
                    </form>
                  </ul>
                </div>
              </div>
        </section>
    </main>

</body>
</html>