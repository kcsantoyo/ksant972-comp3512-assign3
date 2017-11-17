  <div class="mdl-layout__drawer mdl-color--blue-grey-800 mdl-color-text--blue-grey-50">
       <div class="profile">
           <img src="resources/images/profile.png" class="avatar">
           <br/>
           <h4 id="username"><?php echo $_SESSION['FirstName'] .' '. $_SESSION['LastName']; ?></h4>           
           <span><?php echo $_SESSION['Email']?></span>
       </div>

    <nav class="mdl-navigation mdl-color-text--blue-grey-300">
        <a href="index.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">dashboard</i> Dashboard</a>
        <a href="profile.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">account_circle</i> User Profile</a>
        <a href="browse-employees.php"class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">group</i> Employees</a>
        <a href="browse-books.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">view_list</i> Books</a>
        <a href="browse-universities.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">school</i> Universities</a>
        <a href="analytics.php" class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">insert_chart</i> Analytics</a> 
        <a href="aboutus.php"class="mdl-navigation__link mdl-color-text--blue-grey-300" href=""><i class="material-icons" role="presentation">info</i> About</a>
    </nav>
  </div>