  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
     <h1 class="mdl-layout-title"><span>Assignment</span> 3</h1>
     <link rel="stylesheet" href="resources/css/styles.css">
     <script src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
     <script src="resources/js/header.js"></script>

     
     <div class="mdl-layout-spacer"></div>
     
     
        <a href='logout.php'><label id="logout" class="material-icons mdl-badge mdl-badge--overlap">
            <i id="logoutIcon" class="material-icons">exit_to_app</i>
            </label>  
        </a>
        <div class="mdl-tooltip" for="logout">
            LOGOUT
        </div>
       
                  
<!--<label id="tt2" class="material-icons mdl-badge mdl-badge--overlap" data-badge="5">account_box</label>  
<div class="mdl-tooltip" for="tt2">Messages</div>                     
                 
<label id="tt3" class="material-icons mdl-badge mdl-badge--overlap" data-badge="4">notifications</label> 
 <div class="mdl-tooltip" for="tt3">Notifications</div>  -->
                  
        
<!--
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
        <label class="mdl-button mdl-js-button mdl-button--icon"
               for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>
        <div id="searchContent" class="mdl-textfield__expandable-holder">

        </div>
      </div>  
-->
        <div id="searchIcon">
            <div class="mdl-tooltip" for="searchIcon">FIND EMPLOYEE</div>
            <label class="mdl-button mdl-js-button mdl-button--icon">
            <i class="material-icons">search</i>
        </div>
            
     			<form action="browse-employees.php" method='GET'>
						<div id="searchBox">
						    <input type="text" name="find" placeholder="Enter City or Last Name"/>
						    <button id="searchBtn" type="submit">Search</button>
						</div>
				</form>
    </div>

  </header>
  
  