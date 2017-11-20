  <header onclick="hideBtn();" class="mdl-layout__header">
    <div class="mdl-layout__header-row">
     <h1 class="mdl-layout-title"><span>Assignment</span> 2</h1>
     <link rel="stylesheet" href="resources/css/styles.css">
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
     			<form action="browse-employees.php" method='GET'>
					<div onclick="showBtn();" class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
						<label onclick="showBtn();" id="searchIcon" class="mdl-button mdl-js-button mdl-button--icon" for="site-search">
							<div class="mdl-tooltip" for="searchIcon">Find Employee</div>
							<i class="material-icons">search</i>
						</label>
						<div class="mdl-textfield__expandable-holder" for="site-search">
						    <input class="mdl-textfield__input" name="find" type="search" id="site-search" />
						    <!--<label class="mdl-textfield__label" for="site-search">Search</label>-->
						</div>
						<button id="searchBtn" type="submit">Search</button>
					</div>
				</form>
    </div>

  </header>
  
  