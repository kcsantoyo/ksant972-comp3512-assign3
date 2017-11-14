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
      $id = $_GET["id"];
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
              <div class="mdl-cell mdl-cell--3-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Employees</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul class="demo-list-item mdl-list">

                  <?php
                        $sql = "Select EmployeeID, FirstName, LastName from Employees ORDER BY LastName ASC;";
                        
                         foreach($pdo ->query($sql) as $row){
                            echo "<li>
                                  <a href='browse-employees.php?id=".$row['EmployeeID']."'>".
                                  $row['FirstName']." ".$row['LastName'].
                                "</li>";
                          }
                  ?>

                    </ul>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--9-col card-lesson mdl-card  mdl-shadow--2dp">

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
                            if(isset($_GET["id"])) {
                            
                             $sql = "select * from Employees where EmployeeID LIKE '".$id."';";
                             
                              foreach($pdo->query($sql) as $row){
                                echo "<h3>".$row["FirstName"]." ".$row["LastName"]."</h3>";
                                echo "<p>".$row["Address"];
                                echo "<br/>".$row["City"].", ".$row["Region"];
                                echo "<br/>".$row["Country"].", ".$row["Postal"];
                                echo "<br/>".$row["Email"]."</p>";
                                
                             } 
                              
                            }
                            else {
                              echo "<p>No user selected</p>";
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
                                        $sql = "select * from EmployeeToDo where EmployeeID LIKE'".$id."' ORDER BY DateBy DESC;";
                                        
                                        foreach($pdo ->query($sql) as $row){
                                        $date = date_create($row["DateBy"]);
                                        $date = date_format($date, "Y-M-d");
                                        echo "<tr>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$date."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Status"]."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Priority"]."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Description"]."</td>";
                                        echo "</tr>";
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
                                        $sql = "select * from EmployeeMessages where EmployeeID LIKE'".$id."' ORDER BY MessageDate DESC;";
                                        
                                        foreach($pdo->query($sql) as $row){
                                        $date = date_create($row["MessageDate"]);
                                        $date = date_format($date, "Y-M-d");
                                        echo "<tr>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$date."</td>";
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Category"]."</td>";
                                            
                                            foreach($pdo->query("select * from Contacts Where ContactID LIKE '".$row['ContactID']."';") as $contact){
                                             echo "<td class='mdl-data-table__cell--non-numeric'>".$contact["FirstName"]." ".$contact["LastName"]."</td>";
                                              
                                            }
                                            
                                            echo "<td class='mdl-data-table__cell--non-numeric'>".$row["Content"]."</td>";
                                        echo "</tr>";
                                        }
                                  ?>

                                  </tbody>
                                </table>


                          </div>
                        </div>
                        </div>

      
</div>
</div>
        </section>
    </main>

</body>
</html>