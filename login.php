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
        
 <div id="login_layout" class="mdl-layout mdl-js-layout mdl-color--grey-100">
	<main id="login_layout_content" class="mdl-layout__content">
	    <section class="page-content">
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--black">
				<h2 class="mdl-card__title-text">Welcome</h2>
			</div>
	  	<div class="mdl-card__supporting-text">
				<form action='verification.php' method='POST'>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" name="username" />
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password" name="password"/>
						<label class="mdl-textfield__label" for="userpass">Password</label>
					</div>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<input class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type='submit' value='Login'/>
			</div>
			</form>
		</div>
		 </section>
	</main>
</div>

<?php
    if (isset($_GET['error'])) {
        echo '<script language="javascript">';
        echo 'alert("Login Unsuccessful")';
        echo '</script>';
    }
?>
</body>
</html>

     <!-- <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <main class="mdl-layout__content mdl-color--grey-50">
                <section class="page-content">
                    <div class="mdl-grid">
                        <div class="mdl-layout-spacer"></div>
                        
                            <div class="mdl-cell mdl-cell--4-col">
                                <div class="mdl-card__title mdl-color--orange mdl-color-text--black">
                                    <h2 class="mdl-card__title-text">Login</h2>
                                </div>
                                <form action='verification.php' method='post'>
                                    Username: <input class="mdl-textfield__input" type="text" name="username">
                                    Password:  <input class="mdl-textfield__input" type="password" name="password"></input>
                                    <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="submit" value='Submit'/>
                                </form>
                            </div>
                        <div class="mdl-layout-spacer"></div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
-->